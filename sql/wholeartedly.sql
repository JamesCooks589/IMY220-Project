-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 07:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wholeartedly`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(101) NOT NULL,
  `summary` text NOT NULL,
  `body` longtext NOT NULL,
  `artist` varchar(101) NOT NULL,
  `artPieceTitle` varchar(50) NOT NULL,
  `artPieceImage` varchar(255) NOT NULL,
  `hashtags` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `likes` varchar(255) NOT NULL,
  `dislikes` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `user_id`, `title`, `author`, `summary`, `body`, `artist`, `artPieceTitle`, `artPieceImage`, `hashtags`, `category`, `date`, `likes`, `dislikes`, `deleted`) VALUES
(1, 2, 'Starry Night by Vincent van Gogh: A Brushstroke of Joy', 'Demo_Tester', 'An article about how happy VIncent van Gogh\'s Starry Night makes me', 'Vincent van Gogh, the tormented genius of 19th-century art, left behind a legacy of masterpieces that continue to captivate and inspire generations. Among his many iconic works, \"Starry Night\" stands out as a radiant testament to his artistic brilliance and emotional depth. With its swirling sky, sleepy village, and vibrant colors, \"Starry Night\" exudes an ineffable beauty that has the power to make anyone, including myself, undeniably happy.\r\n\r\nAs I gaze upon this masterpiece, I am enveloped in a sense of profound happiness. The painting\'s celestial sky, rendered in swirling shades of blue and deep indigo, seems to dance and come alive. The stars, with their ethereal, luminous glow, create a hypnotic rhythm that transports me to a realm beyond the canvas. Van Gogh\'s interpretation of the cosmos is not just a reflection of the physical world but also an insight into the artist\'s inner turmoil. It reminds me that beauty can emerge from even the most tumultuous of souls, and that brings me a deep sense of joy.\r\n\r\nBeneath the celestial spectacle, the village lies in peaceful slumber. The quaint, cypress tree-lined streets and the quiet, sleepy town emanate an aura of tranquility. This duality, where the heavens are in a state of frenzy while the village remains serene, reflects the complex emotions of life. It reminds me that in the chaos of existence, there is often a tranquil center that we can find and cherish. This realization fills me with an inexplicable happiness.\r\n\r\nThe palette of colors used by van Gogh in \"Starry Night\" is a symphony of emotional resonance. The bold yellows and rich blues collide and intertwine, creating a vivid, electrifying display. These colors, chosen with a deliberate artistic intent, evoke a sense of passion and vitality. They remind me that life, with all its ups and downs, is a vibrant and beautiful journey, and I can\'t help but smile when I reflect on this profound truth.\r\n\r\nThe distinctive, swirling patterns in the sky and the rhythmic flow of the stars in \"Starry Night\" hint at the restless spirit of the artist himself. Van Gogh, who suffered from mental illness and personal struggles, found solace in his art. In the midst of his own torment, he was able to create something so awe-inspiring. This teaches me that happiness can be found even in the darkest of moments, and the act of creation itself can be a therapeutic and joyful endeavor.\r\n\r\n\"Starry Night\" is a painting that celebrates the extraordinary in the ordinary. It reminds me that there is magic in the everyday, and that we need not look far to find happiness. The night sky that van Gogh depicted so brilliantly is a part of our daily existence, yet through his artistic lens, it becomes extraordinary and delightful. This thought fills me with an immense sense of happiness, knowing that there is beauty all around us if we just take the time to notice and appreciate it.\r\n\r\nThe painting\'s enduring popularity speaks to its ability to resonate with people from all walks of life. Whether you are an art connoisseur or someone encountering \"Starry Night\" for the first time, there is an inexplicable happiness that washes over you when you look at it. Van Gogh\'s ability to capture the essence of life, its complexities, and its sheer wonder in a single canvas is truly remarkable.\r\n\r\nIn conclusion, \"Starry Night\" by Vincent van Gogh is a testament to the power of art to inspire joy and happiness. Its swirling skies, peaceful village, vibrant colors, and the story of the tormented artist behind it all combine to create a masterpiece that transcends time and continues to make hearts swell with happiness. It serves as a reminder that, even in the midst of life\'s chaos and turmoil, we can find moments of beauty, tranquility, and joy. Van Gogh\'s \"Starry Night\" is a brushstroke of joy on the canvas of our lives, reminding us to appreciate the extraordinary in the ordinary and find happiness in the most unexpected places.', '0', 'Starry Night', 'images/gallery/6479824eb0b2b171275693d989a8b2fd.png', 'StarryNight, Happiness, Joy', 'visual_art', '2023-10-23', '2', '', 0),
(2, 2, 'Auguste Rodin\'s \'The Thinker\': A Timeless Sculpture of Contemplation', 'Demo_Tester', 'Auguste Rodin\'s \'The Thinker\' stands as a masterpiece of human contemplation, embodying the eternal pursuit of knowledge and self-reflection. Discover its profound significance and artistic brilliance.', 'Auguste Rodin\'s \'The Thinker\' is a remarkable sculpture that has captured the hearts and minds of art enthusiasts around the world for over a century. Created in 1880, this iconic artwork portrays a man deep in thought, his brow furrowed, and his chin resting on his hand. The sculpture, which is part of Rodin\'s larger work \'The Gates of Hell,\' has a profound and timeless significance.\r\n\r\n\'The Thinker\' is a symbol of human contemplation and the eternal quest for knowledge and self-reflection. It represents the intellectual and philosophical pursuits that define our existence. This powerful and thought-provoking piece is a reflection of the complexities of the human mind, the struggle for understanding, and the relentless pursuit of wisdom.\r\n\r\nAuguste Rodin, the French sculptor behind this masterpiece, was known for his ability to infuse his sculptures with deep emotional and intellectual depth. He believed in the importance of expressing genuine human experiences in art, and \'The Thinker\' is a testament to his mastery in this regard. The sculpture was originally conceived as a representation of the poet Dante Alighieri, who appears in his renowned work, \"The Divine Comedy.\"\r\n\r\nToday, \'The Thinker\' stands as a symbol of the intellectual and philosophical spirit. It has been recreated in various sizes and materials, and several copies can be found in museums, public spaces, and private collections worldwide. The sculpture remains an enduring source of inspiration and contemplation for all who encounter it.', 'Auguste Rodin', 'The Thinker', 'images/gallery/fb3a0de29533a0120611eb627a1b681d.png', 'AugusteRodin, TheThinkerSculpture, PhilosophyInArt', 'Sculpture', '2023-10-26', '', '', 0),
(3, 6, 'Andrew Lloyd Webber\'s \'Cats\': A Theatrical Extravaganza Beyond Imagination', 'KeeperOfKitties', '\'Cats,\' composed by Andrew Lloyd Webber, is a mesmerizing blend of music, dance, and storytelling. Dive into a world of feline fantasy that has enthralled audiences for decades.', '\'Cats,\' the iconic musical composed by the legendary Andrew Lloyd Webber, is a theatrical masterpiece that has left a lasting impact on the world of musical theater. Premiered in 1981, \'Cats\' is based on T.S. Eliot\'s \'Old Possum\'s Book of Practical Cats\' and has since become a cultural phenomenon.\r\n\r\nThe musical invites audiences into a whimsical world where a tribe of Jellicle Cats gather for an annual event, the Jellicle Ball. Over the course of one magical night, these feline characters tell their stories through captivating song and dance, hoping to be chosen to ascend to the Heaviside Layer and be reborn. The production boasts an ensemble cast of unforgettable characters, including the mischievous Rum Tum Tugger, the elegant Grizabella, and the enigmatic Mr. Mistoffelees.\r\n\r\nAndrew Lloyd Webber\'s composition combines various musical styles, from classical to pop, and features timeless songs like \"Memory,\" which has become an enduring classic in its own right. The choreography, created by the renowned Gillian Lynne, brings the characters to life with acrobatic and graceful dance routines that have enthralled audiences for decades.\r\n\r\nThe success of \'Cats\' can be attributed to its unique storytelling, imaginative set design, and unforgettable music. The musical has won numerous awards and continues to be performed in theaters worldwide, captivating new generations of theatergoers. It\'s a testament to the enduring power of storytelling and the magic of live theater.', 'several', 'Cats The Musical', 'images/gallery/be2ed406035029d1f872983230940914.png', 'AndrewLloydWebber, CatsMusical, MusicalTheaterMagic', 'Theatre', '2023-10-26', '', '', 0),
(4, 3, 'The Great Wave off Kanagawa: A Timeless Icon of Japanese Art', 'JamesTheChef', 'Hokusai\'s \'The Great Wave off Kanagawa\' is an iconic woodblock print that has left an indelible mark on the world. Dive into the beauty and symbolism of this masterpiece.', 'Hokusai\'s \'The Great Wave of Kanagawa,\' a woodblock print from the early 19th century, stands as an iconic masterpiece of Japanese art and a symbol of its rich cultural heritage. This print is part of Hokusai\'s series \"Thirty-Six Views of Mount Fuji,\" and it has transcended time and borders, becoming a globally recognized symbol of Japanese art.\r\n\r\nThe print captures a towering wave, its foamy crest curving dramatically and menacingly over three boats with Mount Fuji in the background. It embodies the power and beauty of nature while emphasizing the vulnerability of human existence in its path. The contrast between the towering wave and the distant, serene Mount Fuji creates a striking and harmonious composition.\r\n\r\nHokusai\'s meticulous craftsmanship and innovative techniques in woodblock printing, along with his use of Prussian blue, which was a newly introduced pigment at the time, contributed to the artwork\'s lasting appeal. The artist\'s ability to convey movement, energy, and emotion through the wave\'s depiction is a testament to his mastery.\r\n\r\nThe \'Great Wave\' has been interpreted in various ways. Some see it as a symbol of Japan\'s relationship with the ever-present and sometimes destructive force of nature, while others find in it a metaphor for the uncertainties and challenges of life. Its impact on art and popular culture is immeasurable, and it continues to inspire artists, designers, and scholars.\r\n\r\nToday, \'The Great Wave of Kanagawa\' is held in the collection of the Tokyo National Museum and is often featured in exhibitions around the world. It remains an enduring symbol of Japanese art, appreciated for its profound symbolism and artistic brilliance.\r\n\r\nHokusai\'s \'The Great Wave off Kanagawa\' is not merely a woodblock print; it\'s an embodiment of nature\'s majesty and human existence\'s vulnerability, making it a timeless icon of Japanese art.', 'Hokusai', 'The Great Wave off Kanagawa', 'images/gallery/9eda0b2e3418c50fa694b93e8adccc4a.png', 'TheGreatWave, Hokusai, JapaneseArt', 'Visual Art', '2023-10-26', '2', '', 0),
(5, 3, 'Sydney Opera House: Marveling at Architectural Grandeur', 'JamesTheChef', 'The Sydney Opera House is an architectural masterpiece that graces the shores of Sydney Harbor, captivating the world with its stunning design and cultural significance.', 'The Sydney Opera House, an architectural wonder, is a testament to human creativity and innovation. Located on the picturesque shores of Sydney Harbor in Australia, this iconic structure is renowned for its distinctive and breathtaking design. Designed by the Danish architect Jørn Utzon, the Sydney Opera House has become a global symbol of architectural excellence.\r\n\r\nWhat sets the Sydney Opera House apart is its striking shell-like appearance, composed of a series of white, sail-like shells or \"sails\" that seem to billow in the wind. These gleaming white structures rise dramatically against the backdrop of the azure waters of the harbor and the deep blue Australian sky. The Opera House\'s architectural elegance captures the eye, and its innovative design still leaves architects and engineers marveling at its construction.\r\n\r\nThe intricacy of the structure is remarkable. The sails are covered in a staggering one million glossy white tiles imported from Sweden, adding to the Opera House\'s mesmerizing visual appeal. It\'s not just an architectural marvel from the outside; the interior spaces are equally awe-inspiring. The various performance venues and spaces within are designed with acoustics and functionality in mind, ensuring that it serves its purpose as a world-class performing arts venue.\r\n\r\nThe Sydney Opera House is not only an architectural feat but also a symbol of cultural significance. It serves as a hub for the performing arts, hosting a diverse range of events, from opera and ballet to contemporary music and theater. Its status as a UNESCO World Heritage Site further underscores its cultural importance.\r\n\r\nVisitors from all corners of the globe come to Sydney to witness the beauty of this architectural masterpiece up close. Whether seen from a distance while taking a harbor cruise or explored from within during a performance, the Sydney Opera House continues to evoke a sense of wonder and admiration.\r\n\r\nThe Sydney Opera House\'s architectural grandeur is a testament to human ingenuity and a stunning representation of Australia\'s cultural and artistic legacy.', 'Jørn Utzon and Peter Hall', 'Sydney Opera House', 'images/gallery/bf31758d867f386c8c40e519c5b87cce.png', 'Sydney, Architecture, Marvel', 'Architecture', '2023-10-26', '', '', 0),
(6, 8, 'Cast Away: Tom Hanks\' Unforgettable Journey of Survival and Self-Discovery', 'WinstonOverwatch', 'In the film \"Cast Away,\" Tom Hanks delivers a tour de force performance as a FedEx executive stranded on a desert island, showcasing the human spirit\'s resilience.', '\"Cast Away,\" directed by Robert Zemeckis, is a cinematic masterpiece that immerses viewers in the gripping tale of Chuck Noland, portrayed by Tom Hanks. This remarkable film explores themes of survival, isolation, and the indomitable human spirit.\r\n\r\nThe story revolves around Chuck Noland, a time-obsessed FedEx executive who, after a plane crash, finds himself stranded on a deserted island in the South Pacific. With no means of communication or hope of rescue, Chuck must learn to survive on the island, relying on his resourcefulness and resilience. Tom Hanks\' portrayal of Chuck\'s physical and emotional transformation earned him widespread acclaim and an Academy Award nomination.\r\n\r\nWhat makes \"Cast Away\" truly exceptional is its ability to capture the human experience under extreme circumstances. The film delves into Chuck\'s evolution from a corporate-driven, time-conscious individual to a resourceful, self-reliant survivor. His relationship with a volleyball, affectionately named Wilson, serves as a poignant symbol of his loneliness and need for companionship.\r\n\r\nThe film\'s production values are equally remarkable. From the stunning cinematography that showcases the beauty and brutality of the island to the meticulous details of survival techniques, \"Cast Away\" is a testament to the art of filmmaking.\r\n\r\nThe narrative is a profound exploration of the human condition, touching on themes of isolation, hope, and the intrinsic will to survive. The ending is both emotionally powerful and open to interpretation, allowing audiences to reflect on the film\'s central message.\r\n\r\n\"Cast Away\" invites viewers to contemplate their own lives, the importance of time, and the resilience of the human spirit. Tom Hanks\' performance, combined with Robert Zemeckis\' direction, creates a cinematic experience that remains unforgettable and thought-provoking.\r\n\r\n\"Cast Away\" is a testament to the power of storytelling and an exploration of the human spirit\'s ability to overcome adversity.', 'Tom Hanks', 'Cast Away', 'images/gallery/bec7b8006d0f3a16e6ad3bcbee2b07c5.png', 'CastAway, TomHanks, SurvivalDrama', 'Film', '2023-10-26', '', '', 0),
(7, 11, 'My Magical Connection with the Harry Potter Series', 'Slitherin4DaWin', 'J.K. Rowling\'s \"Harry Potter\" series has been a significant part of my life, evoking a wide range of emotions and forging a deep, personal connection with its enchanting world.', 'The \"Harry Potter\" series, created by the brilliant J.K. Rowling, has been a constant presence in my life, taking me on an extraordinary emotional journey that I hold dear. These books have not just been a part of my literary world; they\'ve become an integral part of who I am.\r\n\r\nOpening the pages of \"Harry Potter and the Sorcerer\'s Stone\" for the first time was like receiving an acceptance letter to Hogwarts. The thrill of discovering this enchanting world, with its magical creatures, spellbinding spells, and a trio of friends I\'d grow to adore, was unlike anything I\'d experienced before in literature. I felt a genuine sense of belonging, as if I, too, was a student at Hogwarts, eagerly anticipating the Sorting Hat\'s decision.\r\n\r\nAs the series unfolded, I became emotionally invested in the characters\' lives. I felt the fear and heartache as they faced dark forces, the joy of their victories, and the grief of their losses. The books made me laugh out loud with the mischievous twins, Fred and George, and cry with Harry over the profound sacrifices made by those he loved.\r\n\r\nGrowing up with these characters and witnessing their personal growth mirrored my own journey of self-discovery. The \"Harry Potter\" series taught me about the power of friendship, the importance of standing up for what\'s right, and the unwavering strength that can be found within oneself.\r\n\r\nThe emotional connection deepened with the films, as I watched the magical world come to life on the big screen. The majestic Hogwarts castle, the thrill of Quidditch matches, and the heartwarming moments of camaraderie became even more tangible.\r\n\r\nThe \"Harry Potter\" series isn\'t just a story; it\'s a cherished part of my life. It\'s a testament to the enduring magic of storytelling and its ability to evoke a multitude of emotions, from nostalgia and wonder to inspiration and a profound connection with its characters.', 'J.K. Rowling', 'Harry Potter', 'images/gallery/1910d645bf82d6dcb46919bbdcb71e6c.png', 'HayyPotter, PersonalConnection, MagicalJourney', 'Literature', '2023-10-26', '', '', 0),
(8, 10, 'The \'Pale Blue Dot\': A Profound Perspective on Our Place in the Universe', 'OliveGreen', 'The iconic \'Pale Blue Dot\' photograph by Carl Sagan transformed my perspective on life and our planet, making me feel both humbled and awestruck by the vast cosmos.', 'When I first encountered Carl Sagan\'s iconic \'Pale Blue Dot\' photograph, it was as if I had been granted a momentary glimpse into the universe\'s soul. This awe-inspiring image profoundly altered my perception of our place in the cosmos and evoked a spectrum of emotions that left me feeling both humbled and awestruck.\r\n\r\nIn the photograph, Earth appears as a minuscule, pale blue dot suspended in the vast expanse of space. It was captured by the Voyager 1 spacecraft in 1990 as it departed our solar system. The image\'s power lies not in its visual grandeur, but in the profound message it conveys about our planet\'s insignificance in the cosmic scale. It reminds us that everything we know and cherish exists on this tiny speck, our home.\r\n\r\nLooking at the \'Pale Blue Dot,\' I felt an overwhelming sense of humility. It was a poignant reminder of how inconsequential our individual concerns and disputes truly are in the grand scheme of the universe. The photograph served as a mirror, reflecting the fragility of our existence and the importance of unity and cooperation as inhabitants of this small celestial orb.\r\n\r\nSimultaneously, the image filled me with a profound sense of wonder. It was a testament to humanity\'s ability to explore, learn, and innovate, sending a spacecraft beyond the boundaries of our solar system and capturing such a mesmerizing image. The \'Pale Blue Dot\' exemplified the potential for human achievement and our enduring curiosity about the cosmos.\r\n\r\nUltimately, \'The Pale Blue Dot\' is an eloquent reminder of our collective responsibility to preserve and protect the only home we know. It\'s an inspiration to cherish our planet and foster a deeper connection with the natural world, for the Earth is indeed a unique and precious gem in the cosmic wilderness.\r\n\r\nThis photograph continues to be a source of contemplation, offering a shift in perspective that leaves me feeling both profoundly small and remarkably connected to the vast universe beyond.', 'Carl Sagan', 'The Pale Blue Dot', 'images/gallery/ea2b0dea6a55b71cd2b20ef0f2c4330c.png', 'CarlSagan, Space, NASA', 'Photography', '2023-10-26', '', '', 0),
(9, 7, 'The School of Athens: Awe and Reverence for the Masterpiece', 'MikeEasy', 'Raphael\'s \'The School of Athens\' left me in awe. Its grandeur, harmonious composition, and the impassioned faces of the philosophers conveyed the timeless pursuit of wisdom and our shared intellectual heritage.', 'The moment I laid eyes on Raphael\'s \'The School of Athens,\' I was swept away by an overwhelming sense of awe and reverence. The painting\'s grandeur, complexity, and sheer beauty left me emotionally moved in a way that few works of art have ever done.\r\n\r\nAs I gazed upon the towering figures of ancient philosophers, such as Plato and Aristotle, engaged in thoughtful discourse and contemplation, I felt a deep connection to the timeless pursuit of knowledge and wisdom. The way they were rendered, with their flowing robes and intricate details, added to the sense of classical grace and intellectual curiosity that the painting embodies.\r\n\r\nRaphael\'s masterful use of perspective, architecture, and symmetry in \'The School of Athens\' is nothing short of breathtaking. The expansive, perfectly balanced hall seemed to stretch into infinity, emphasizing the endless possibilities of human thought and discovery. It was as though I was transported to a place where profound ideas flowed freely and the pursuit of truth was paramount.\r\n\r\nThe harmonious blending of various philosophical traditions and the harmonious coexistence of diverse scholars from different time periods struck a chord within me. It was a powerful reminder of the universality of human knowledge, transcending cultural and temporal boundaries.\r\n\r\nBut what truly moved me was the emotion in the faces of these philosophers. Each figure conveyed a distinct sense of purpose, from the contemplative gaze of Socrates to the confident stance of Aristotle. Their expressions carried the weight of centuries of human inquiry, and it was impossible not to be affected by the depth of their intellectual passion.\r\n\r\n\'The School of Athens\' is a painting that inspires introspection and reflection. It reminds me of the boundless potential of the human mind and the profound impact of philosophy on our understanding of the world. The emotional connection I felt with this masterpiece left me with a lasting appreciation for the enduring power of art to transcend time and touch the very core of our humanity.\r\n\r\nIn short, \'The School of Athens\' is not just a painting; it\'s a profound emotional experience that leaves you with a deep appreciation for the beauty of human intellect and the enduring legacy of philosophical thought.', 'Raphael', 'The School of Athens', 'images/gallery/9c35f71e52fe8f33659ca62532341762.png', 'Painting, Raphael, Athens', 'Visual Art', '2023-10-26', '', '', 0),
(10, 7, 'The Creation of Adam: An Overwhelming Sense of Divine Connection', 'MikeEasy', 'Michelangelo\'s \'The Creation of Adam\' instilled in me a sense of awe and spiritual connection. The portrayal of God and Adam\'s almost-touching fingers conveyed the profound mysteries of existence and the human quest for connection with the divine.', 'The moment I beheld Michelangelo\'s \'The Creation of Adam,\' I felt an indescribable sense of wonder and spiritual connection. The painting\'s portrayal of God reaching out to Adam with their fingers almost touching evoked a profound sense of divine presence.\r\n\r\nThe painting\'s remarkable composition, with its flowing forms and intricate detail, created a sense of movement and vitality. The energy that seemed to flow from the touch of God\'s and Adam\'s fingers conveyed the spark of life itself.\r\n\r\nIt was as though I was witnessing a transcendent moment of creation, where the divine and the human met. The emotional impact of the painting made me ponder the profound mysteries of existence and the deep yearning for a connection with something greater than ourselves.\r\n\r\nThe iconic image of the outstretched hands is a reminder of the eternal quest for understanding and connection with the divine. It left me feeling a profound sense of humility and awe, recognizing the boundless power and beauty of creation.\r\n\r\n\'The Creation of Adam\' is a work of art that transcends time and culture, resonating with a universal human longing for a deeper connection with the divine. It is a masterpiece that continues to inspire and instill a sense of wonder and reverence for the profound mysteries of life.', 'Michelangelo', 'The Creation of Adam', 'images/gallery/5f788684b6b113a6b8b569100058017f.png', 'Spirtual, Michelangelo, AweStruck', 'Visual Art', '2023-10-26', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Visual Art'),
(2, 'Sculpture'),
(3, 'Music'),
(4, 'Literature'),
(5, 'Performing Art'),
(6, 'Theatre'),
(7, 'Film'),
(8, 'Architecture'),
(9, 'Fashion'),
(10, 'Photography'),
(11, 'Digital Art');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listName` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `articles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`list_id`, `user_id`, `listName`, `description`, `articles`) VALUES
(4, 2, 'MyFavs', 'A list for all my favourite articles', '4,8,9');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user1`, `user2`, `date`, `time`, `message`) VALUES
(0, 2, 3, '2023-10-23', '23:05:32', 'Hello world'),
(0, 3, 2, '2023-10-23', '23:12:05', 'Hello to you'),
(0, 3, 2, '2023-10-24', '17:17:58', 'Hello live'),
(0, 3, 2, '2023-10-24', '17:32:24', 'Hello Demo_tester'),
(0, 2, 3, '2023-10-24', '17:32:30', 'Hi'),
(0, 3, 2, '2023-10-24', '17:32:50', 'Actually live updating poggies\r\n'),
(0, 2, 3, '2023-10-25', '17:34:38', 'Hello my good sir how have u been after all these years ascii art would be a very funny idea Im just not sure it would work'),
(0, 2, 3, '2023-10-25', '23:30:43', 'Hello'),
(0, 3, 2, '2023-10-25', '23:31:03', 'Whattup');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `reviewText` varchar(100) NOT NULL,
  `reviewImage` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `likes` varchar(255) NOT NULL,
  `dislikes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `article_id`, `user_id`, `username`, `reviewText`, `reviewImage`, `date`, `likes`, `dislikes`) VALUES
(1, 1, 2, 'Demo_Tester', 'Hello there guys :)', '', '2023-10-25', '0', '0,2'),
(2, 4, 2, 'Demo_Tester', 'Wow this was very thought provoking', '', '2023-10-26', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profilePicture` varchar(2555) NOT NULL,
  `prefrence` varchar(10) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `followers` varchar(255) NOT NULL,
  `following` varchar(255) NOT NULL,
  `readArticles` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `username`, `password`, `profilePicture`, `prefrence`, `dateOfBirth`, `followers`, `following`, `readArticles`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', 'ADMIN', '$uper$tr0ng@dminP@$$w0rd', 'images/profilePictures/c2wpctxb5sl61.jpg', 'dark', '2000-01-01', '', '', '1'),
(2, 'Demo', 'Tester', 'test@test.com', 'Demo_Tester', 'test1234', 'images/profilePictures/Untitled.png', 'dark', '1900-01-01', '3', '3,10,7', '1,4'),
(3, 'James', 'Cooks', 'jamescooks@gmail.com', 'JamesTheChef', 'James1234', 'images/profilePictures/4.png', 'dark', '2002-06-21', '2', '2,8,7', ''),
(5, 'John', 'Smith', 'john.smith@email.com', 'BigJohno', 'JohnSmith123', 'images/profilePictures/default4.png', 'dark', '1990-10-25', '', '', ''),
(6, 'Sarah', 'Johnson', 'sarah.johnson@email.com', 'KeeperOfKitties', 'Sarah1992Pass', 'images/profilePictures/default5.png', 'dark', '1992-09-15', '', '', ''),
(7, 'Michael', 'Davis', 'michael.davis@email.com', 'MikeEasy', 'Michael92Pass', 'images/profilePictures/default3.png', 'dark', '1992-07-08', '2,3', '', ''),
(8, 'Emily', 'Wilson', 'emily.wilson@email.com', 'WinstonOverwatch', 'Emily1988Pass', 'images/profilePictures/default3.png', 'dark', '1988-03-30', '3', '', ''),
(9, 'James', 'Brown', 'james.brown@email.com', 'James007', 'James95Pass', 'images/profilePictures/default3.png', 'dark', '1995-02-14', '', '', ''),
(10, 'Olivia', 'Lee', 'olivia.lee@email.com', 'OliveGreen', 'Olivia2023Pass', 'images/profilePictures/default4.png', 'dark', '1997-09-25', '2', '', ''),
(11, 'Daniel', 'Harris', 'daniel.harris@email.com', 'Slitherin4DaWin', 'Daniel123Pass', 'images/profilePictures/default5.png', 'dark', '1993-12-10', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
