CREATE DATABASE IF NOT EXISTS snackshop;
USE snackshop;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products` (`id`, `name`, `description`, `cost`) VALUES
(1, 'Choco Bites', 'Small chocolate snack bites.', '2.99'),
(2, 'Fruit Gummies', 'Assorted fruit-flavored gummy snacks.', '1.99'),
(3, 'Pretzel Twists', 'Crunchy salted pretzel twists.', '3.49'),
(4, 'Caramel Popcorn', 'Sweet caramel-coated popcorn.', '4.25'),
(5, 'Energy Bar', 'High-protein snack bar.', '2.50');

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

COMMIT;
