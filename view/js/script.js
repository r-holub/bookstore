(function($){
	var form_add_book = '#form-add-book';
	
	var input_isbn = '#input-isbn';
	var input_pages = '#input-pages';
	var input_title = '#input-title';
	var input_description = '#input-description';
	var input_author = '#input-author';
	
	var books_table = '#books-res';
	
	var book;
	var book_id;
	var book_title;
	
	var authors;
	
	$(document).ready(function(){
		displayAllBooks();
		
		/* Retrieve all authors for autocomplete */
		$.post('/book/getAuthors').done(function(data){
			authors = data;
			$(input_author).autocomplete({
				source: authors
			});
		});
	});

	/* Get book info by ISBN */
	$(input_isbn).on('blur', function(){
		var isbn = $(this).val();
		if (isbn) {
			$.ajax({
				url: 'https://openlibrary.org/isbn/'+isbn+'.json',
				type: 'GET',
				dataType: 'json',
				success: function(json) {
					if (!$(input_pages).val()) {
						$(input_pages).val(json.number_of_pages);
					}
					
					if (!$(input_title).val()) {
						$(input_title).val(json.title);
					}
					
					getBookDescription(json.works[0].key);
					getBookAuthor(json.authors[0].key);
				},
				error: function(xhr, ajaxOptions, thrownError) {
					console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	});
	
	/* Add a new book */
	$(form_add_book).on('submit', function() {
		/* Clear all past errors */
		$(form_add_book + ' .success-field').html('');
		$(form_add_book + ' .error-field').html('');
		$(form_add_book + ' input, ' + form_add_book + ' textarea').removeClass('error');
		
		/* Send request to add new book */
		$.post('/book/addBook', $(this).serialize()).done(function(data){
			if (data.error) {
				/* Display error */
				switch (data.error_code) {
					case 'unknown':
						$(form_add_book + ' button[type="submit"] + .error-field').html(data.error);
						break;
					case 'isbn':
						$(input_isbn).addClass('error');
						$(input_isbn + ' + .error-field').html(data.error);
						break;
					case 'pages':
						$(input_pages).addClass('error');
						$(input_pages + ' + .error-field').html(data.error);
						break;
					case 'title':
						$(input_title).addClass('error');
						$(input_title + ' + .error-field').html(data.error);
						break;
					case 'description':
						$(input_description).addClass('error');
						$(input_description + ' + .error-field').html(data.error);
						break;
					case 'author':
						$(input_author).addClass('error');
						$(input_author + ' + .error-field').html(data.error);
						break;
					default:
						$(form_add_book + ' button[type="submit"] + .error-field').html(data.error);
				}
			} else if (data.success) {
				/* Display success text */
				$(form_add_book + ' .success-field').html(data.success);
				
				/* Clear all field */
				$(input_isbn + ', ' + input_pages + ', ' + input_title + ', ' + input_description + ', ' + input_author).val('');
				
				$(books_table).html('');
				displayAllBooks();
			}
		});
		
		return false;
	});
	
	/* Remove an existing book */
	$('body').on('click', books_table + ' .remove', function(){
		book = $(this).closest('.book');
		book_id = book.attr('data-id');
		if (book_id) {
			book_title = book.find('.title').html();
			
			$('#confirm-delete .book-title').html(book_title);
			$('#confirm-delete').modal('show');
		}
	});
	
	$('#confirm-delete .cancel').on('click', function(){
		$('#confirm-delete').modal('hide');
	});
	
	$('#confirm-delete .confirm').on('click', function(){
		$.post('/book/deleteBook', {'book_id': book_id}).done(function(data){
			book.detach();
			$('#confirm-delete').modal('hide');
		});
	});
	
	function getBookDescription(works_link) {
		$.ajax({
			url: 'https://openlibrary.org'+works_link+'.json',
			type: 'GET',
			dataType: 'json',
			success: function(json) {
				var description = json.description.value ? json.description.value : json.description;
				
				if (!$(input_description).val()) {
					$(input_description).val(description);
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
	
	function getBookAuthor(authors_link) {
		$.ajax({
			url: 'https://openlibrary.org'+authors_link+'.json',
			type: 'GET',
			dataType: 'json',
			success: function(json) {
				if (!$(input_author).val()) {
					$(input_author).val(json.name);
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
	
	function displayAllBooks() {
		$.post('/book/getBooks').done(function(books){
			$(books).each(function(i,e){
				var html = '<tr class="book" data-id="'+books[i].book_id+'">';
				html += '<td class="isbn">'+books[i].isbn+'</td>';
				html += '<td class="title">'+books[i].title+'</td>';
				html += '<td class="author">'+books[i].author_name+'</td>';
				html += '<td class="pages">'+books[i].pages+'</td>';
				html += '<td class="description">'+books[i].description+'</td>';
				html += '<td><a role="button" class="btn btn-danger remove">Remove</a></td>';
				html += '</tr>';
				$(books_table).append(html);
			});
		});
	}
	
})(jQuery);