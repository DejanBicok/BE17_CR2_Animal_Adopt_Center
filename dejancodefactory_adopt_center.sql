-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2023 at 11:10 AM
-- Server version: 5.7.42
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dejancodefactory_adopt_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopt_center`
--

CREATE TABLE `adopt_center` (
  `adopt_id` int(11) NOT NULL,
  `fk_user` int(11) DEFAULT NULL,
  `fk_animal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adopt_center`
--

INSERT INTO `adopt_center` (`adopt_id`, `fk_user`, `fk_animal`) VALUES
(14, 14, 14),
(15, 14, 15),
(29, 15, 23),
(31, 15, 22),
(32, 14, 28);

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `animal_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `size` varchar(100) NOT NULL,
  `age` date NOT NULL,
  `vaccination` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animal_id`, `name`, `picture`, `location`, `description`, `size`, `age`, `vaccination`, `status`) VALUES
(14, 'Luigi', '63781a12f3eca.jpg', 'Salzburg, Austria', 'Dog: Jack Russell Terrier, happy, energetic dog with a strong desire to work.', 'Small Breed', '2020-05-05', 'Fully Vaccinated', ''),
(15, 'Zeus', '63781dcd22b7d.jpg', 'Graz, Austria', 'Dog: Doberman, short, sleek and shiny coat that is black, dark red, blue or fawn with rust colored markings on the face, body and tail.', 'Large Breed', '2012-08-19', 'Fully Vaccinated', ''),
(16, 'Toby', '63781f5e8b1d5.jpg', 'St. Veit im Pongau, Austria', 'Dog: Very outgoing, trustworthy, and eager to please family puppy. Relatively easy to train. Energetic, powerful, enjoys outdoor play.', 'Large Breed', '2022-08-09', 'Not fully Vaccinated', ''),
(17, 'Odie', '6378203a75b86.jpg', 'Vienna, Austria', 'Cat: Long, muscular body, a long neck, and long, lean legs with small, oval shaped feet and a long, thin, whip-like tail.', 'Small Breed', '2010-07-02', 'Fully Vaccinated', ''),
(18, 'Axel', '6378218ba23d8.jpg', 'Frankfurt, Germany', 'Dog: Easygoing, fun loving to any family. True companion dog, thrive on human contact.', 'Small Breed', '2017-04-08', 'Fully Vaccinated', ''),
(19, 'Jasper', '637822d299d44.jpg', 'Stuttgart, Germany', 'Cat: Persian cat is known and loved for its very sweet, gentle, calm disposition. Though Persian cats are quite friendly, they require gentle handling. ', 'Small Breed', '2014-03-30', 'Fully Vaccinated', ''),
(20, 'Bella', '637823a1931dc.jpg', 'Vienna, Austria', 'Dog: The Airedale stands among the worlds most versatile dog breeds and has distinguished himself as hunter, athlete, and companion.', 'Large Breed', '2019-12-16', 'Fully Vaccinated', ''),
(21, 'James', '63782439115ae.jpg', 'Innsbruck, Austria', 'Dog: Loving and lovable, happy, and companionable, all qualities that make them excellent family dogs.', 'Small Breed', '2019-06-09', 'Fully Vaccinated', ''),
(22, 'Daisy', '637825322b05a.jpg', 'Mainz, Germany', 'Dog: The Pug has been bred to be a companion and a pleasure to his owners. He has an even and stable temperament, great charm, and an outgoing, loving disposition.', 'Small Breed', '2011-09-20', 'Fully Vaccinated', ''),
(23, 'Maggie', '6378261791ffc.jpeg', 'Bern, Switzerland', 'Cat: Bengal cats have smallish, round heads, large eyes, and striking facial marking. They have strong muscular bodies and a streamlined appearance much like their Asian Leopard ancestors.', 'Small Breed', '2022-07-27', 'Not fully Vaccinated', ''),
(24, 'Max', '637826d428dc7.jpg', 'Linz, Austria', 'Cat: Chartreux feature short gray coats; sweet, round faces; and glimmering copper-color eyes. These cats have large, muscular bodies with short, slight limbs.', 'Small Breed', '2012-01-17', 'Fully Vaccinated', ''),
(25, 'Spot', '6378278f0bc34.jpg', 'Villach, Austria', 'Dog: Energetic breed that rely on a high level of exercise and stimulation.', 'Small Breed', '2009-05-02', 'Fully Vaccinated', ''),
(26, 'Lucy', '637828239bfea.jpg', 'Graz, Austria', 'Dog: Border Collies are energetic, even-tempered and eager to please, making them a good choice for a family pet. They get along well with children and other pets provided they are introduced properly.', 'Large Breed', '2014-02-05', 'Fully Vaccinated', ''),
(27, 'Birdie', '637828bd6a291.jpg', 'Wagrain, Austria', 'Cat: The Birman is a semi long-haired cat with a silky soft, luxuriant coat, beautiful blue eyes and pure white feet (gloves on the front paws, socks on the back.) Under the fur this is a moderately built cat, medium to large with a well-muscled body, rou', 'Small Breed', '2017-12-01', 'Fully Vaccinated', ''),
(28, 'Cooper', '637829a44d509.jpg', 'Wels, Austria', 'Dog: The German shepherd dog is a herding breed known for its courage, loyalty and guarding instincts. This breed makes an excellent guard dog, police dog, military dog, guide dog for the blind and search and rescue dog. For many families, the German shep', 'Large Breed', '2014-04-07', 'Fully Vaccinated', ''),
(35, 'Test Name', 'noimage.png', 'Test Location', 'Test Description', 'Test Size', '2022-01-01', 'Test Vaccination', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `date_of_birth`, `email`, `phone_number`, `address`, `picture`, `password`, `status`) VALUES
(8, 'Admin', '', '1992-01-01', 'jode@mail.com', '', '', '6378eddb93ea3.png', 'cbac07cd70e4f319f42950534cfda8d0c10a7d4d614fd04f0cfd9cc35f4472dc', 'adm'),
(14, 'Stephen', 'Curry', '1990-05-22', 'stephen@mail.com', '', '', '63a9b53b9b4c7.jpg', '9157eb10346fcd53e2f7849dc6d28a79832042ef5d0a34e7ece57da25d7d5080', 'user'),
(15, 'Kevin', 'Durant', '1985-02-05', 'kevin@mail.com', '', '', '63a9b4c1b3a34.jpg', '23728f6692b413f930bfae95bc5951a8e38bc3660988e814a96fbc5ca0575edf', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopt_center`
--
ALTER TABLE `adopt_center`
  ADD PRIMARY KEY (`adopt_id`),
  ADD KEY `fk_user` (`fk_user`),
  ADD KEY `fk_animal` (`fk_animal`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopt_center`
--
ALTER TABLE `adopt_center`
  MODIFY `adopt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adopt_center`
--
ALTER TABLE `adopt_center`
  ADD CONSTRAINT `adopt_center_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `adopt_center_ibfk_2` FOREIGN KEY (`fk_animal`) REFERENCES `animals` (`animal_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
