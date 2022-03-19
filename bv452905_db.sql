-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Хост: bv452905.mysql.ukraine.com.ua
-- Час створення: Бер 19 2022 р., 20:30
-- Версія сервера: 5.7.33-36-log
-- Версія PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `bv452905_db`
--

-- --------------------------------------------------------

--
-- Структура таблиці `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `authors`
--

INSERT INTO `authors` (`author_id`, `name`) VALUES
(1, 'Roald Dahl'),
(3, 'Stephen King'),
(4, 'J.K. Rowling');

-- --------------------------------------------------------

--
-- Структура таблиці `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pages` int(11) NOT NULL,
  `description` text NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `books`
--

INSERT INTO `books` (`book_id`, `isbn`, `title`, `pages`, `description`, `author_id`) VALUES
(1, '0140328726', 'Fantastic Mr. Fox', 96, 'The main character of Fantastic Mr. Fox is an extremely clever anthropomorphized fox named Mr. Fox. He lives with his wife and four little foxes. In order to feed his family, he steals food from the cruel, brutish farmers named Boggis, Bunce, and Bean every night.\r\n\r\nFinally tired of being constantly outwitted by Mr. Fox, the farmers attempt to capture and kill him. The foxes escape in time by burrowing deep into the ground. The farmers decide to wait outside the hole for the foxes to emerge. Unable to leave the hole and steal food, Mr. Fox and his family begin to starve. Mr. Fox devises a plan to steal food from the farmers by tunneling into the ground and borrowing into the farmer\'s houses.\r\n\r\nAided by a friendly Badger, the animals bring the stolen food back and Mrs. Fox prepares a great celebratory banquet attended by the other starving animals and their families. Mr. Fox invites all the animals to live with him underground and says that he will provide food for them daily thanks to his underground passages. All the animals live happily and safely, while the farmers remain waiting outside in vain for Mr. Fox to show up.', 1),
(11, '0671041789', 'The Green Mile', 536, 'The Green Mile is a 1996 serial novel by American writer Stephen King. It tells the story of death row supervisor Paul Edgecombe\'s encounter with John Coffey, an unusual inmate who displays inexplicable healing and empathetic abilities. The serial novel was originally released in six volumes before being republished as a single-volume work. The book is an example of magical realism.\r\n\r\nThe Green Mile won the Bram Stoker Award for Best Novel in 1996. In 1997, The Green Mile was nominated as Best Novel for the British Fantasy Award and the Locus Award. In 2003 the book was listed on the BBC\'s The Big Read poll of the UK\'s \"best-loved novel\".\r\n\r\n\r\n----------\r\nContains:\r\n\r\n 1. [The Two Dead Girls](https://openlibrary.org/works/OL149165W/The_Two_Dead_Girls)\r\n 2. [The Mouse on the Mile](https://openlibrary.org/works/OL149147W/The_Mouse_on_the_Mile)\r\n 3. [Coffey\'s Hands](https://openlibrary.org/works/OL149107W/Coffey\'s_Hands)\r\n 4. [The Bad Death of Eduard Delacroix](https://openlibrary.org/works/OL15861106W/The_Bad_Death_of_Eduard_Delacroix)\r\n 5. [Night Journey](https://openlibrary.org/works/OL16252000W/Night_Journey)\r\n 6. [Coffey on the Mile](https://openlibrary.org/works/OL15136222W/Coffey_on_the_Mile)', 3),
(12, '9780439064873', 'Harry Potter and the Chamber of Secrets', 344, 'Harry Potter #2\r\n\r\nThroughout the summer holidays after his first year at Hogwarts School of Witchcraft and Wizardry, Harry Potter has been receiving sinister warnings from a house-elf called Dobby.\r\n\r\nNow, back at school to start his second year, Harry hears unintelligible whispers echoing through the corridors.\r\n\r\nBefore long the attacks begin: students are found as if turned to stone.\r\n\r\nDobby’s predictions seem to be coming true.\r\n\r\n[Source][1]\r\n\r\n\r\n  [1]: https://www.jkrowling.com/book/harry-potter-chamber-secrets/', 4);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Індекси таблиці `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
