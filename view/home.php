<main class="px-3">
	<section id="block-add-new" class="cover-container">
		<h1>Add a new book</h1>
		<p class="lead">Please fill in all of the fields.</p>
		<form id="form-add-book">
			<div class="row">
				<div class="col">
					<label for="input-isbn">ISBN</label>
					<input id="input-isbn" type="text" class="form-control" name="isbn" placeholder="ISBN" required>
					<span class="error-field"></span>
				</div>
				<div class="col">
					<label for="input-title">Title</label>
					<input id="input-title" type="text" class="form-control" name="title" placeholder="Title" required>
					<span class="error-field"></span>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label for="input-author">Author</label>
					<input id="input-author" type="text" class="form-control" name="author" placeholder="Author" required>
					<span class="error-field"></span>
				</div>
				<div class="col">
					<label for="input-pages">Number of pages</label>
					<input id="input-pages" type="number" class="form-control" name="pages" placeholder="Number of pages" required>
					<span class="error-field"></span>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label for="input-description">Description</label>
					<textarea id="input-description" class="form-control" name="description" placeholder="Description" required></textarea>
					<span class="error-field"></span>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<button type="submit" class="btn btn-light">Submit</button>
					<span class="error-field"></span>
					<span class="success-field"></span>
				</div>
			</div>
		</form>
	</section>
	<section id="block-our-books">
		<h2>Our book selection</h2>
			<table class="table table-dark">
				<thead>
					<tr>
						<th scope="col">ISBN</th>
						<th scope="col">Title</th>
						<th scope="col">Author</th>
						<th scope="col">№ of pages</th>
						<th scope="col">Description</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody id="books-res"></tbody>
			</table>
	</section>
</main>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirmation required
            </div>
            <div class="modal-body">
                Are you sure you want to delete this book: <span class="book-title"></span>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default cancel">Cancel</button>
                <a class="btn btn-danger btn-ok confirm">Confirm</a>
            </div>
        </div>
    </div>
</div>