-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: scie
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('00f4c072bbdf7da13675b03b7c9041813bf934e3','::1',1550771540,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550771540;LAST_REQUEST_TIME|i:1550770470;'),('01b7a6257ffc7f2b2e7db79e74a140f9db7a247c','::1',1558194757,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1558194757;LAST_REQUEST_TIME|i:1558194597;'),('02889d8fbfa84d0881d0d448f48bb859779e21d5','::1',1558116756,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1558116756;LAST_REQUEST_TIME|i:1558116702;'),('03b5579cfc08a7af63a7310bfc13c8c86a333cb1','::1',1556469432,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556469432;LAST_REQUEST_TIME|i:1556469244;message|s:0:\"\";'),('03ecd2b4299602857846103ec5853921214d6a71','::1',1556468672,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556468672;LAST_REQUEST_TIME|i:1556467939;message|s:0:\"\";'),('04a6782d0c0f047ebf78b6931ed468cebb38ab64','::1',1558117406,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1558117406;LAST_REQUEST_TIME|i:1558117267;'),('06ca30b7c93ac1ec0b1ccb85bfb531d9345d3abe','::1',1556301424,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556301424;LAST_REQUEST_TIME|i:1556301159;message|s:0:\"\";'),('0761e42ac6426e3b509fa1de1cd75bd09dfc93b8','::1',1549306485,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549306485;LAST_REQUEST_TIME|i:1549305341;'),('0908f5bb1e066021f07d6061cfbf4610cf4384cb','::1',1558196216,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1558196216;LAST_REQUEST_TIME|i:1558195753;'),('0b4bce19f5d9931cc46258719a9aa7153bca46d3','::1',1549304857,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549304857;LAST_REQUEST_TIME|i:1549304808;'),('0b6210f8e3b672af765bfa87b6ca524c65a5b452','::1',1555748240,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1555748240;LAST_REQUEST_TIME|i:1555748185;'),('0d09216033df02aaa60ceef92ad73991f95876ab','::1',1550685294,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550685294;LAST_REQUEST_TIME|i:1550684249;'),('0d9b2578148c265c5974376248022c0fc7bee0fb','::1',1556466087,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556466087;LAST_REQUEST_TIME|i:1556465540;message|s:0:\"\";'),('0dcbe6bd4c3a21de7aed384b1f5d275e2252b995','::1',1556460049,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556460049;LAST_REQUEST_TIME|i:1556458306;'),('11780c9b630c37d29989ce2548b41c8aae059adc','::1',1550670567,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550670567;LAST_REQUEST_TIME|i:1550669084;message|s:0:\"\";'),('12c473472d22f67a22e2621fa062a77e35cb26ec','::1',1550690739,_binary '__ci_last_regenerate|i:1550690739;'),('14450170758a6d9c18eef5eaaa8cca121eb50d29','::1',1556470118,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556470118;LAST_REQUEST_TIME|i:1556469851;message|s:0:\"\";'),('148bb5937e53388973f09ad00a6b05c2042ceec2','::1',1556296568,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556296568;LAST_REQUEST_TIME|i:1556296557;message|s:0:\"\";'),('1621d00c1db402fae6c447b560e5f37f9bbc6e98','::1',1550772430,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550772430;LAST_REQUEST_TIME|i:1550772095;'),('16ea2d03c97820996a7df9ba36597155ab4fddb3','::1',1549391407,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549389165;LAST_REQUEST_TIME|i:1549389311;'),('1a2c6717913a8eb11114a1ffc328561bd9ce41ce','::1',1558115746,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1558115746;LAST_REQUEST_TIME|i:1558115242;'),('1be8e0277e264cd99b8ec40837b49d730e38e2a4','::1',1548176548,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1548176548;LAST_REQUEST_TIME|i:1548176159;message|s:0:\"\";'),('1da81b603113b47fdf4ee40f5a0f17c4fbd349a0','::1',1555754868,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1555754868;LAST_REQUEST_TIME|i:1555753960;'),('1e2ac6646e4685ab986b26176c785004dd15f434','::1',1548176855,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1548176855;LAST_REQUEST_TIME|i:1548176847;message|s:0:\"\";'),('1e6151abbdca52008fadfa1e2db7fafb307f21db','::1',1556299109,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556299109;LAST_REQUEST_TIME|i:1556298683;'),('1f40c1c136c911512995f715090c00df2f25ccc1','::1',1550765259,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550765259;LAST_REQUEST_TIME|i:1550761983;'),('202a77a1524e6fada52369b43aa49842a94d2078','::1',1549308913,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549308913;LAST_REQUEST_TIME|i:1549308839;'),('21142ee56f5d1cd692b1008e1ea839ee802fd714','::1',1550694725,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550694725;LAST_REQUEST_TIME|i:1550694154;'),('246dac236e1f37d6fc802bd8d6b969d3eebfe251','::1',1558117062,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1558117062;LAST_REQUEST_TIME|i:1558117025;'),('24ea9df126c7efd445f7b6b5eb1b815e9edea6b0','::1',1558196481,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1558196216;LAST_REQUEST_TIME|i:1558196276;'),('261b3d47dab1889da96289e16beb7c60efeddda4','::1',1555755650,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1555755650;LAST_REQUEST_TIME|i:1555753960;'),('2b0f6bf64b1fd49185225794e46240a9ed8859aa','::1',1549308565,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549308565;LAST_REQUEST_TIME|i:1549308367;'),('2eea68cb1d4f209f8348c29dbe947855415ac67e','::1',1556296904,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556296904;LAST_REQUEST_TIME|i:1556296836;message|s:0:\"\";'),('34vks7eou87l10f2ratpgb9arrgrp0m5','::1',1537683089,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1537682964;LAST_REQUEST_TIME|i:1537683039;'),('37eb1d25f96671cc59261dab1a0b8bedeb2f776c','::1',1558195734,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1558195734;LAST_REQUEST_TIME|i:1558194791;'),('38dfbe8bd6c7ae78f9aa305b5207694190dd09de','::1',1557075993,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1557075853;LAST_REQUEST_TIME|i:1557075865;'),('3eca80eb0068c3603cf4d2e905d6ce0604a8361e','::1',1556472211,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556471676;LAST_REQUEST_TIME|i:1556471878;'),('4000d4c4991451dcfbbc8a9f58bd72305a2ba0d8','::1',1548174982,_binary '__ci_last_regenerate|i:1548174982;error|s:0:\"\";'),('44653b56a4b2e3503c6a71970d77f76bd974403a','::1',1550668940,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550668940;LAST_REQUEST_TIME|i:1550668726;'),('45318d2aa55ad267441f345334514cc197948e32','::1',1549388802,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549388802;LAST_REQUEST_TIME|i:1549388591;'),('4667bde1e20c64d81cbbda9f1e2cd60e2882337e','::1',1555746566,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1555746566;LAST_REQUEST_TIME|i:1555746493;'),('4744216b741860a26d6b020c57108997b6c91ff8','::1',1549307119,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549307119;LAST_REQUEST_TIME|i:1549306533;'),('47d3d8a2f71e5af26f19ea35714b7a4afa5e8f5f','::1',1556462582,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556462582;LAST_REQUEST_TIME|i:1556458306;'),('49c89eb5f481a77e780c7eeebfc23e394279b19e','::1',1550766645,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550766645;LAST_REQUEST_TIME|i:1550766439;'),('4c0b37af52238881d067436519543dfadf745fba','::1',1556462244,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556462244;LAST_REQUEST_TIME|i:1556458306;'),('4c9ff44958a8327827bf784732db93b3c1dd6978','::1',1549787768,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549785580;LAST_REQUEST_TIME|i:1549785746;'),('4lh4l74qf7r26ili48o6aj95sdlj186a','::1',1536511338,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1536510446;LAST_REQUEST_TIME|i:1536510697;'),('501687f6472b5025f7facb2ab8f4978778a0c8fe','::1',1556469804,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556469804;LAST_REQUEST_TIME|i:1556469432;message|s:0:\"\";'),('50f8aef08fa4e7c00f51fc9d341078cf86a805ff','::1',1550768498,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550768498;LAST_REQUEST_TIME|i:1550768182;'),('51a784a2ab7d25e85d84aeda4c0da62eed67b8d1','::1',1555749709,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1555749709;LAST_REQUEST_TIME|i:1555749702;'),('541a73d281882639872bde3d4a6f943bf6822387','::1',1550769606,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550769606;LAST_REQUEST_TIME|i:1550768550;'),('5d68afb4c5fe364107e943c18d1b21da76f3f3f4','::1',1548558448,_binary '__ci_last_regenerate|i:1548558448;error|s:0:\"\";'),('628f0d755d8f2a02c39a2e68812e1ebc0daee797','::1',1557075578,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1557075578;LAST_REQUEST_TIME|i:1557074853;'),('64bb8b89abe4a00c73d87191bec73ab99316e570','::1',1556295637,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556295637;LAST_REQUEST_TIME|i:1556292392;'),('659eabe1dff59ff0919be0bea52a7a0d4759b8bd','::1',1550765740,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550765740;LAST_REQUEST_TIME|i:1550765629;'),('65b9730f05762b86e4c3e940045f0da518ecad64','::1',1555753854,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1555753854;LAST_REQUEST_TIME|i:1555753214;'),('69f5d9584476ebfab2b68257aa25ec0d4976e8b5','::1',1549305208,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549305208;LAST_REQUEST_TIME|i:1549305117;'),('6b811640890f553381e80ad82e69b8cc92b5744e','::1',1555747921,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1555747921;LAST_REQUEST_TIME|i:1555746566;'),('6c6d6be8ee532b029ea166f56b8a47c1cb9127ab','::1',1550695672,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550695672;LAST_REQUEST_TIME|i:1550694824;'),('6dfac30f6e99dee9bcfd5a546b58890207e49195','::1',1556464779,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556464779;LAST_REQUEST_TIME|i:1556458306;'),('6f42aa682e86a52344812c96ac52f90009aa55d9','::1',1549304550,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549304550;LAST_REQUEST_TIME|i:1549304482;'),('7149f37abc7c89527811da2164f50e35a8e55952','::1',1556301068,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556301068;LAST_REQUEST_TIME|i:1556300361;'),('738778b5b156973246300c24120e6863cd852291','::1',1549304202,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549304202;LAST_REQUEST_TIME|i:1549303204;'),('74114f149e134bb3cb4f207f9a13b635a79c0c6b','::1',1550767695,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550767695;LAST_REQUEST_TIME|i:1550767565;'),('763ce0b4c3b1ced7616736f465ad5bb0b1cfc408','::1',1555755710,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1555755650;LAST_REQUEST_TIME|i:1555753960;'),('767136ef90925c90b3696e0444fcca1636524cbe','::1',1548176103,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1548176103;LAST_REQUEST_TIME|i:1548176095;message|s:0:\"\";'),('7782fb9f7038e8cb5d6c246211560a7d07c35ee4','::1',1550768045,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550768045;LAST_REQUEST_TIME|i:1550767698;'),('77a647c2c6948351685a73802044d8430a60dd89','::1',1547488254,_binary '__ci_last_regenerate|i:1547488254;message|s:0:\"\";'),('787c5ca7f8a5770a591f8efde72476ba97197f98','::1',1550683286,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550683286;LAST_REQUEST_TIME|i:1550683104;'),('79413c31d67155ed9f5e7391d5115853f0e1ea56','::1',1550693617,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550693617;LAST_REQUEST_TIME|i:1550690751;'),('7b330425a31f3b9800ce18af078798e81162ab35','::1',1550768906,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550768906;LAST_REQUEST_TIME|i:1550768550;'),('7b672a894f7275bc89f8088a002182e0a549d617','::1',1555749032,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1555749032;LAST_REQUEST_TIME|i:1555748521;'),('7c14abbb1faf1026e04ac811c85a5389f372c7d5','::1',1558117545,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1558117406;LAST_REQUEST_TIME|i:1558117267;'),('7geg9249cjlvemt9h3p3rkm41vg3481g','::1',1536480759,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1536480759;LAST_REQUEST_TIME|i:1536479818;'),('809e0148e45a2b0ccdcde667a6095da31fce09e4','::1',1558194342,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1558194342;LAST_REQUEST_TIME|i:1558192809;'),('82824d2a8d3a487978c07563b2d7c883e06123c3','::1',1548175797,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1548175797;LAST_REQUEST_TIME|i:1548175737;message|s:0:\"\";'),('858172605dfa25cf4ee1696a5ac263e36d6069aa','::1',1558116452,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1558116452;LAST_REQUEST_TIME|i:1558115967;'),('86e9951e8eb113354404f1a9de9c897fd1f8ecd0','::1',1555753104,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1555753104;LAST_REQUEST_TIME|i:1555749702;'),('88ah49211ghhjm7o95voua30s1l6klsd','::1',1538896691,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1538896673;LAST_REQUEST_TIME|i:1538896691;'),('8cefb0e3f4066e73136e56ea47480301cb7af191','::1',1556302135,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556302135;LAST_REQUEST_TIME|i:1556301453;message|s:0:\"\";'),('8f375c20ac7fd0b5358fcc2f9d95f5d15e869689','::1',1556467919,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556467919;LAST_REQUEST_TIME|i:1556467709;message|s:0:\"\";'),('900aede586904a68cf3dc5b476735a320d4e6422','::1',1550662271,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550662271;LAST_REQUEST_TIME|i:1550661990;message|s:0:\"\";'),('94414f6e98d6da57de023a9b02b4d3f7aca68aa4','::1',1556298568,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556298568;LAST_REQUEST_TIME|i:1556297987;'),('95d41de636b132c0efa0837059151c745a9e25ca','::1',1548558693,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1548558657;LAST_REQUEST_TIME|i:1548558693;'),('9a9300c1f25bc3231353a77195d4548bc0b1b878','::1',1556302318,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556302135;LAST_REQUEST_TIME|i:1556301453;message|s:0:\"\";'),('9f9539537b7392e7dd9b70a58b60efbe0181d4cb','::1',1548354076,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1548354076;LAST_REQUEST_TIME|i:1548354025;'),('a053912f434001686656b62adaa170cda736468d','::1',1555749405,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1555749405;LAST_REQUEST_TIME|i:1555749227;'),('a2d6f4abef046196861d4e49992b0a8b034250ff','::1',1548557940,_binary '__ci_last_regenerate|i:1548557940;error|s:0:\"\";'),('a2e9b2a9037c0c84448669559c878c298f09790b','::1',1550769239,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550769239;LAST_REQUEST_TIME|i:1550768550;'),('a2f9fa8191f71077558dfc7a5f32fcb4c249229c','::1',1556467223,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556467223;LAST_REQUEST_TIME|i:1556466860;message|s:0:\"\";'),('a5b4ab3bc06b1bf2500af9137c23ecb9ad46ef7e','::1',1556296264,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556296264;LAST_REQUEST_TIME|i:1556296255;message|s:0:\"\";'),('a5e80be4559ef43559a9e48039fae4b1f1a5b1c2','::1',1549307791,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549307791;LAST_REQUEST_TIME|i:1549307770;'),('a68e4247c17a4dc551b62a443beb96d2d345853c','::1',1550661366,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550661366;LAST_REQUEST_TIME|i:1550657374;'),('a770822e786703b5519bdbb211bd1685782dcf8f','::1',1549554780,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549554765;LAST_REQUEST_TIME|i:1549554780;'),('a8bc52766851043d5774b706edda707d6dae04d7','::1',1550767379,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550767379;LAST_REQUEST_TIME|i:1550766780;'),('af827537806bafca6720757a0aa345450866823e','::1',1556461771,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556461771;LAST_REQUEST_TIME|i:1556458306;'),('b29e2da2cfec04ce89e118f7484e17e662544f8b','::1',1550694112,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550694112;LAST_REQUEST_TIME|i:1550693802;'),('b2adf574189cbba24879a45dca98169518298d85','::1',1556465197,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556465197;LAST_REQUEST_TIME|i:1556458306;'),('b587d76966b518df7b17d6acc81369b821add10e','::1',1550771915,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550771915;LAST_REQUEST_TIME|i:1550771825;'),('b5d83e18e60a9bfcb7b480e010c0af1fc49acd9a','::1',1548574788,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1548574771;LAST_REQUEST_TIME|i:1548574778;'),('b62f00c4dcd8bcec9a5bcce775d71d0f7abc7e09','::1',1549193165,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549192901;LAST_REQUEST_TIME|i:1549193165;'),('b725a2fe0c37a00df17e34e4dc87c623f4b4393a','::1',1556295958,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556295958;LAST_REQUEST_TIME|i:1556295955;'),('b8b36167b235c89b607ed9822e510c69bc3dd2a2','::1',1550681468,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550681468;LAST_REQUEST_TIME|i:1550678391;'),('b8e80341673ba4211c5ef5f53d99c75068cd8ad2','::1',1556300061,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556300061;LAST_REQUEST_TIME|i:1556299731;'),('b8f927de44f0b347878d68e8c1a053e6bd01f3b5','::1',1550682893,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550682893;LAST_REQUEST_TIME|i:1550681522;'),('bf6763795f65b0ff15b21ef1cd2830a96559b66d','::1',1550695849,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550695689;LAST_REQUEST_TIME|i:1550695843;'),('c0b56a659ebad796a2bb845498ca5d5738cb11e7','::1',1547488254,_binary '__ci_last_regenerate|i:1547488254;message|s:0:\"\";'),('c0f6c09f9fcc32458a41583ccc338fc8b698e103','::1',1550773274,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550773274;LAST_REQUEST_TIME|i:1550772852;'),('c31b73fdc8a134f8ff573dbdc476e52b14b1704b','::1',1548354390,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1548354390;LAST_REQUEST_TIME|i:1548354372;message|s:0:\"\";'),('c60ed190a84256236d984bcd63426aeb35ba6c46','::1',1549309228,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549309228;LAST_REQUEST_TIME|i:1549309106;'),('c64bc459d3a1277985aa5c07a14030cc5d5a1e08','::1',1548178520,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1548178520;LAST_REQUEST_TIME|i:1548176919;message|s:0:\"\";'),('c8d0e189d954732aaac08489750a5ac6841de691','::1',1556291498,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556291498;LAST_REQUEST_TIME|i:1556291436;'),('cd52f067feeb841e5f4e634d1e2d419e8322ea39','::1',1556297965,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556297965;LAST_REQUEST_TIME|i:1556296984;message|s:0:\"\";'),('cdj9lst29dfev8a1lb0bjapsnj840juu','::1',1536255454,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1536255442;LAST_REQUEST_TIME|i:1536255454;'),('ce021a926f0bbedbecb6964cfaf7a284bdcbabfe','::1',1556292243,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556292243;LAST_REQUEST_TIME|i:1556291948;'),('d0738e1e4d9082ff6f469391ecf6a0201e4c30fb','::1',1556300552,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556300552;LAST_REQUEST_TIME|i:1556300361;'),('d19f3d3d003fcd5df8e19b8cc663547395ba9c34','::1',1556468989,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556468989;LAST_REQUEST_TIME|i:1556468680;message|s:0:\"\";'),('d301c35a8543e2551d83bcb570180bd0f0a38ad6','::1',1556466786,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556466786;LAST_REQUEST_TIME|i:1556466692;message|s:0:\"\";'),('d6facdbc00a2d8dcdea39655c139ce2660aadf3f','::1',1549307488,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549307488;LAST_REQUEST_TIME|i:1549307119;'),('d72d66ea1d7ed1cf71350ac299c049663825ee8d','::1',1555753461,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1555753461;LAST_REQUEST_TIME|i:1555753214;'),('d89a3ba6a8b3bdfae3e2bc9bac1768fad01d9063','::1',1558192809,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1558192809;LAST_REQUEST_TIME|i:1558192749;'),('d8b9a1186cc3c2b54bc8a9beb532b001d1c45aa4','::1',1556467598,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556467598;LAST_REQUEST_TIME|i:1556467504;message|s:0:\"\";'),('db56b41e0aca7504c07cc16d518dd39a1ef474d3','::1',1549309463,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549309228;LAST_REQUEST_TIME|i:1549309456;'),('dccfe22e17b169123395646fc88cedb30ce9df50','::1',1550684219,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550684219;LAST_REQUEST_TIME|i:1550683287;message|s:0:\"\";'),('dd358e415127bd253690df890906611d8648acb8','::1',1556301778,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556301778;LAST_REQUEST_TIME|i:1556301453;message|s:0:\"\";'),('de86f1a1f5ff57f6443c0cae13624b22701b7972','::1',1550669799,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550669799;LAST_REQUEST_TIME|i:1550669084;message|s:0:\"\";'),('deb62a6e3c6a7d03cdf34dfaa42330b173c0cef9','::1',1556459625,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556459625;LAST_REQUEST_TIME|i:1556458306;'),('e0361a6544aa0a4826ea2e15eb8306a32ece189d','::1',1550773274,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550773274;LAST_REQUEST_TIME|i:1550772852;'),('e0b4895326a0134bc849d36c36d82e582e42acd0','::1',1556299731,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556299731;LAST_REQUEST_TIME|i:1556299113;'),('e1310e9b8b8d93b6c1c3c747668502bc18904072','::1',1550661803,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550661803;LAST_REQUEST_TIME|i:1550661505;'),('e1cfbab81420b2089983a255825ed0fb773322a2','::1',1556291900,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556291900;LAST_REQUEST_TIME|i:1556291498;'),('e7620dbb0373454532efc67e3fff58bbbc3534c0','::1',1556466420,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556466420;LAST_REQUEST_TIME|i:1556466302;message|s:0:\"\";'),('e8232bec5f48f8ad8a150f572fbc2a8ca924d103','::1',1548175471,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1548175471;LAST_REQUEST_TIME|i:1548175238;'),('e94ea312f95974c70da5be8c199db4b6eea456d0','::1',1548354689,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1548354390;LAST_REQUEST_TIME|i:1548354639;message|s:0:\"\";backUrl|s:34:\"http://localhost/CRM/admin/orders/\";'),('eba9da164a0addc097bad18c9c10d16e8c2e31ce','::1',1550678370,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550678370;LAST_REQUEST_TIME|i:1550670698;'),('ej561tbbb8t2qim7bm5murogbatu2n8n','::1',1536479818,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1536479818;LAST_REQUEST_TIME|i:1536479302;'),('f348a9ddaf942c0e6d01e5792b2d9b47b0743442','::1',1556471664,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1556471664;LAST_REQUEST_TIME|i:1556470118;message|s:0:\"\";'),('f6744ac8ef901a6f4e5620cb4a397cd61b554139','::1',1550766140,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550766140;LAST_REQUEST_TIME|i:1550765989;'),('f707c321bb739f788030129cdda7ed5d57e234a6','::1',1555746212,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1555746212;LAST_REQUEST_TIME|i:1555745845;'),('f7a966f1873eb84c92c1f1e2dcaf48984dad219a','::1',1550668531,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550668531;LAST_REQUEST_TIME|i:1550662280;message|s:0:\"\";'),('f7f790650c3e09049f3ab31654124c65b0403041','::1',1549308141,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549308141;LAST_REQUEST_TIME|i:1549307939;'),('f8877c7ce5f37d877a5ea40db291db2c19921a1b','::1',1549389165,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1549389165;LAST_REQUEST_TIME|i:1549388832;'),('fa0115a1410745b78be4bffb06e98b975249f295','::1',1550770248,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550770248;LAST_REQUEST_TIME|i:1550768550;'),('fadf9d85bcd903149b32b3f78d1a6f9af0756b73','::1',1550772736,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1550772736;LAST_REQUEST_TIME|i:1550772608;'),('fbddd8541e9ea893f26823aab94d7ee7f09c2d8a','::1',1558115242,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1558115242;LAST_REQUEST_TIME|i:1558115171;'),('ffae2ffa7ac7e5c2fcfff4807b2631f6c5a66a03','::1',1548178520,_binary '__ci_last_regenerate|i:1548178520;'),('l740ro41alm00lffaiu77jl6hv68cdtc','::1',1536480780,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1536480770;LAST_REQUEST_TIME|i:1536480780;'),('ptnfcvlkn7pgie7cd0020ngk837gqg5t','::1',1536471930,_binary 'USER_ID|s:1:\"1\";USER_NAME|s:5:\"Raghu\";USER_EMAIL|s:15:\"admin@gmail.com\";IMG|s:9:\"raghu.jpg\";ROLE|s:5:\"ADMIN\";__ci_last_regenerate|i:1536471597;LAST_REQUEST_TIME|i:1536471603;');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_banners`
--

DROP TABLE IF EXISTS `tbl_banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_banners` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(100) NOT NULL,
  `banner_img` varchar(100) NOT NULL,
  `banner_desc` varchar(250) NOT NULL,
  `alt_name` varchar(100) NOT NULL,
  `order_no` int(5) NOT NULL,
  `path_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_banners`
--

LOCK TABLES `tbl_banners` WRITE;
/*!40000 ALTER TABLE `tbl_banners` DISABLE KEYS */;
INSERT INTO `tbl_banners` VALUES (1,'Banner1','banner11.jpg','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','',0,0,1,'0000-00-00 00:00:00'),(2,'Banner2','banner22.jpg','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','',0,0,1,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cart_items`
--

DROP TABLE IF EXISTS `tbl_cart_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cart_items` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_info_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `full_total` decimal(10,2) NOT NULL,
  `created_by` int(11) NOT NULL,
  `role` enum('ADMIN','DEALER','OWNER') NOT NULL,
  `created_on` date NOT NULL,
  `is_checkout` enum('NO','YES') NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cart_items`
--

LOCK TABLES `tbl_cart_items` WRITE;
/*!40000 ALTER TABLE `tbl_cart_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cart_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_clients`
--

DROP TABLE IF EXISTS `tbl_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_clients` (
  `client_id` int(5) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(50) NOT NULL,
  `alt_name` varchar(50) NOT NULL,
  `path_id` int(5) NOT NULL,
  `client_logo` varchar(15) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_clients`
--

LOCK TABLES `tbl_clients` WRITE;
/*!40000 ALTER TABLE `tbl_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_contact_info`
--

DROP TABLE IF EXISTS `tbl_contact_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_contact_info` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_contact_info`
--

LOCK TABLES `tbl_contact_info` WRITE;
/*!40000 ALTER TABLE `tbl_contact_info` DISABLE KEYS */;
INSERT INTO `tbl_contact_info` VALUES (1,'Raghu Dandu','raghu@mydwayz.com','9989875983','Subject','Message','2018-01-08'),(2,'','','','','','2019-01-14'),(3,'','','','','','2019-01-24');
/*!40000 ALTER TABLE `tbl_contact_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_contact_requests`
--

DROP TABLE IF EXISTS `tbl_contact_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_contact_requests` (
  `request_id` int(5) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(100) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `request_mail` varchar(100) NOT NULL,
  `request_message` text NOT NULL,
  `receiver_mail` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_contact_requests`
--

LOCK TABLES `tbl_contact_requests` WRITE;
/*!40000 ALTER TABLE `tbl_contact_requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_contact_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_countries`
--

DROP TABLE IF EXISTS `tbl_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` char(2) COLLATE utf8_bin DEFAULT NULL,
  `country_name` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`country_id`),
  KEY `idx_country_code` (`country_code`)
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_countries`
--

LOCK TABLES `tbl_countries` WRITE;
/*!40000 ALTER TABLE `tbl_countries` DISABLE KEYS */;
INSERT INTO `tbl_countries` VALUES (1,'AD','Andorra',1),(2,'AE','United Arab Emirates',1),(3,'AF','Afghanistan',1),(4,'AG','Antigua and Barbuda',1),(5,'AI','Anguilla',1),(6,'AL','Albania',1),(7,'AM','Armenia',1),(8,'AN','Netherlands Antilles',1),(9,'AO','Angola',1),(10,'AQ','Antarctica',1),(11,'AR','Argentina',1),(12,'AS','American Samoa',1),(13,'AT','Austria',1),(14,'AU','Australia',1),(15,'AW','Aruba',1),(16,'AX','Aland Islands',1),(17,'AZ','Azerbaijan',1),(18,'BA','Bosnia and Herzegovina',1),(19,'BB','Barbados',1),(20,'BD','Bangladesh',1),(21,'BE','Belgium',1),(22,'BF','Burkina Faso',1),(23,'BG','Bulgaria',1),(24,'BH','Bahrain',1),(25,'BI','Burundi',1),(26,'BJ','Benin',1),(27,'BL','Saint Barthélemy',1),(28,'BM','Bermuda',1),(29,'BN','Brunei',1),(30,'BO','Bolivia',1),(31,'BQ','Bonaire, Saint Eustatius and Saba ',1),(32,'BR','Brazil',1),(33,'BS','Bahamas',1),(34,'BT','Bhutan',1),(35,'BV','Bouvet Island',1),(36,'BW','Botswana',1),(37,'BY','Belarus',1),(38,'BZ','Belize',1),(39,'CA','Canada',1),(40,'CC','Cocos Islands',1),(41,'CD','Democratic Republic of the Congo',1),(42,'CF','Central African Republic',1),(43,'CG','Republic of the Congo',1),(44,'CH','Switzerland',1),(45,'CI','Ivory Coast',1),(46,'CK','Cook Islands',1),(47,'CL','Chile',1),(48,'CM','Cameroon',1),(49,'CN','China',1),(50,'CO','Colombia',1),(51,'CR','Costa Rica',1),(52,'CS','Serbia and Montenegro',1),(53,'CU','Cuba',1),(54,'CV','Cape Verde',1),(55,'CW','Curaçao',1),(56,'CX','Christmas Island',1),(57,'CY','Cyprus',1),(58,'CZ','Czech Republic',1),(59,'DE','Germany',1),(60,'DJ','Djibouti',1),(61,'DK','Denmark',1),(62,'DM','Dominica',1),(63,'DO','Dominican Republic',1),(64,'DZ','Algeria',1),(65,'EC','Ecuador',1),(66,'EE','Estonia',1),(67,'EG','Egypt',1),(68,'EH','Western Sahara',1),(69,'ER','Eritrea',1),(70,'ES','Spain',1),(71,'ET','Ethiopia',1),(72,'FI','Finland',1),(73,'FJ','Fiji',1),(74,'FK','Falkland Islands',1),(75,'FM','Micronesia',1),(76,'FO','Faroe Islands',1),(77,'FR','France',1),(78,'GA','Gabon',1),(79,'GB','United Kingdom',1),(80,'GD','Grenada',1),(81,'GE','Georgia',1),(82,'GF','French Guiana',1),(83,'GG','Guernsey',1),(84,'GH','Ghana',1),(85,'GI','Gibraltar',1),(86,'GL','Greenland',1),(87,'GM','Gambia',1),(88,'GN','Guinea',1),(89,'GP','Guadeloupe',1),(90,'GQ','Equatorial Guinea',1),(91,'GR','Greece',1),(92,'GS','South Georgia and the South Sandwich Islands',1),(93,'GT','Guatemala',1),(94,'GU','Guam',1),(95,'GW','Guinea-Bissau',1),(96,'GY','Guyana',1),(97,'HK','Hong Kong',1),(98,'HM','Heard Island and McDonald Islands',1),(99,'HN','Honduras',1),(100,'HR','Croatia',1),(101,'HT','Haiti',1),(102,'HU','Hungary',1),(103,'ID','Indonesia',1),(104,'IE','Ireland',1),(105,'IL','Israel',1),(106,'IM','Isle of Man',1),(107,'IN','India',1),(108,'IO','British Indian Ocean Territory',1),(109,'IQ','Iraq',1),(110,'IR','Iran',1),(111,'IS','Iceland',1),(112,'IT','Italy',1),(113,'JE','Jersey',1),(114,'JM','Jamaica',1),(115,'JO','Jordan',1),(116,'JP','Japan',1),(117,'KE','Kenya',1),(118,'KG','Kyrgyzstan',1),(119,'KH','Cambodia',1),(120,'KI','Kiribati',1),(121,'KM','Comoros',1),(122,'KN','Saint Kitts and Nevis',1),(123,'KP','North Korea',1),(124,'KR','South Korea',1),(125,'KW','Kuwait',1),(126,'KY','Cayman Islands',1),(127,'KZ','Kazakhstan',1),(128,'LA','Laos',1),(129,'LB','Lebanon',1),(130,'LC','Saint Lucia',1),(131,'LI','Liechtenstein',1),(132,'LK','Sri Lanka',1),(133,'LR','Liberia',1),(134,'LS','Lesotho',1),(135,'LT','Lithuania',1),(136,'LU','Luxembourg',1),(137,'LV','Latvia',1),(138,'LY','Libya',1),(139,'MA','Morocco',1),(140,'MC','Monaco',1),(141,'MD','Moldova',1),(142,'ME','Montenegro',1),(143,'MF','Saint Martin',1),(144,'MG','Madagascar',1),(145,'MH','Marshall Islands',1),(146,'MK','Macedonia',1),(147,'ML','Mali',1),(148,'MM','Myanmar',1),(149,'MN','Mongolia',1),(150,'MO','Macao',1),(151,'MP','Northern Mariana Islands',1),(152,'MQ','Martinique',1),(153,'MR','Mauritania',1),(154,'MS','Montserrat',1),(155,'MT','Malta',1),(156,'MU','Mauritius',1),(157,'MV','Maldives',1),(158,'MW','Malawi',1),(159,'MX','Mexico',1),(160,'MY','Malaysia',1),(161,'MZ','Mozambique',1),(162,'NA','Namibia',1),(163,'NC','New Caledonia',1),(164,'NE','Niger',1),(165,'NF','Norfolk Island',1),(166,'NG','Nigeria',1),(167,'NI','Nicaragua',1),(168,'NL','Netherlands',1),(169,'NO','Norway',1),(170,'NP','Nepal',1),(171,'NR','Nauru',1),(172,'NU','Niue',1),(173,'NZ','New Zealand',1),(174,'OM','Oman',1),(175,'PA','Panama',1),(176,'PE','Peru',1),(177,'PF','French Polynesia',1),(178,'PG','Papua New Guinea',1),(179,'PH','Philippines',1),(180,'PK','Pakistan',1),(181,'PL','Poland',1),(182,'PM','Saint Pierre and Miquelon',1),(183,'PN','Pitcairn',1),(184,'PR','Puerto Rico',1),(185,'PS','Palestinian Territory',1),(186,'PT','Portugal',1),(187,'PW','Palau',1),(188,'PY','Paraguay',1),(189,'QA','Qatar',1),(190,'RE','Reunion',1),(191,'RO','Romania',1),(192,'RS','Serbia',1),(193,'RU','Russia',1),(194,'RW','Rwanda',1),(195,'SA','Saudi Arabia',1),(196,'SB','Solomon Islands',1),(197,'SC','Seychelles',1),(198,'SD','Sudan',1),(199,'SE','Sweden',1),(200,'SG','Singapore',1),(201,'SH','Saint Helena',1),(202,'SI','Slovenia',1),(203,'SJ','Svalbard and Jan Mayen',1),(204,'SK','Slovakia',1),(205,'SL','Sierra Leone',1),(206,'SM','San Marino',1),(207,'SN','Senegal',1),(208,'SO','Somalia',1),(209,'SR','Suriname',1),(210,'SS','South Sudan',1),(211,'ST','Sao Tome and Principe',1),(212,'SV','El Salvador',1),(213,'SX','Sint Maarten',1),(214,'SY','Syria',1),(215,'SZ','Swaziland',1),(216,'TC','Turks and Caicos Islands',1),(217,'TD','Chad',1),(218,'TF','French Southern Territories',1),(219,'TG','Togo',1),(220,'TH','Thailand',1),(221,'TJ','Tajikistan',1),(222,'TK','Tokelau',1),(223,'TL','East Timor',1),(224,'TM','Turkmenistan',1),(225,'TN','Tunisia',1),(226,'TO','Tonga',1),(227,'TR','Turkey',1),(228,'TT','Trinidad and Tobago',1),(229,'TV','Tuvalu',1),(230,'TW','Taiwan',1),(231,'TZ','Tanzania',1),(232,'UA','Ukraine',1),(233,'UG','Uganda',1),(234,'UM','United States Minor Outlying Islands',1),(235,'US','United States',1),(236,'UY','Uruguay',1),(237,'UZ','Uzbekistan',1),(238,'VA','Vatican',1),(239,'VC','Saint Vincent and the Grenadines',1),(240,'VE','Venezuela',1),(241,'VG','British Virgin Islands',1),(242,'VI','U.S. Virgin Islands',1),(243,'VN','Vietnam',1),(244,'VU','Vanuatu',1),(245,'WF','Wallis and Futuna',1),(246,'WS','Samoa',1),(247,'XK','Kosovo',1),(248,'YE','Yemen',1),(249,'YT','Mayotte',1),(250,'ZA','South Africa',1),(251,'ZM','Zambia',1),(252,'ZW','Zimbabwe',1);
/*!40000 ALTER TABLE `tbl_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_downloads`
--

DROP TABLE IF EXISTS `tbl_downloads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_downloads` (
  `download_id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `path_id` int(5) NOT NULL,
  `video_type` enum('VIDEO','YOUTUBE') NOT NULL,
  `download_file` varchar(20) NOT NULL,
  `youtube_url` varchar(100) NOT NULL,
  `order_no` int(5) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`download_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_downloads`
--

LOCK TABLES `tbl_downloads` WRITE;
/*!40000 ALTER TABLE `tbl_downloads` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_downloads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_hsn_codes`
--

DROP TABLE IF EXISTS `tbl_hsn_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_hsn_codes` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `hsn_code` varchar(6) NOT NULL,
  `description` text NOT NULL,
  `gst` int(11) NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_hsn_codes`
--

LOCK TABLES `tbl_hsn_codes` WRITE;
/*!40000 ALTER TABLE `tbl_hsn_codes` DISABLE KEYS */;
INSERT INTO `tbl_hsn_codes` VALUES (1,'8501','Electric motors and generators (excluding generating sets)',18),(2,'8502','Electric generating sets and rotary converters',18),(3,'8503','Parts suitable for use solely or principally with the machines of heading 8501 or 8502',18),(4,'8504','Transformers Industrial Electronics; Electrical Transformer; Static Convertors (UPS)',18),(5,'8504','Static converters (for example, rectifiers) and inductors, (inserted w.e.f : 14/11/2017 Electrical transformers) [other than Transformers Industrial Electronics; (deleted w.e.f : 14/11/2017 : Electrical Transformer); Static Convertors (UPS)]',18),(6,'8505','Electro-magnets; permanent magnets and articles intended to become permanent magnets after magnetisation; electro-magnetic or permanent magnet chucks, clamps and similar holding devices; electro-magnetic couplings, clutches and brakes; electro-magnetic lifting heads',18),(7,'8506','Primary cells and primary batteries',18),(8,'8507','Electric accumulators, including separators therefor, whether or not rectangular (including square)',28),(9,'8508','Vacuum cleaners',18),(10,'8509','Electro-mechanical domestic appliances, with self-contained electric motor, other than vacuum cleaners of heading 8508 [inserted w.e.f 14/11/2017 :other than wet grinder consisting of stone as a grinder]',18),(11,'8509','Wet grinder consisting of stone as a grinder?',12),(12,'8510','Shavers, hair clippers and hair-removing appliances, with self-contained electric motor',18),(13,'8511','Electrical ignition or starting equipment of a kind used for sparkignition or compression-ignition internal combustion engines (for example, ignition magnetos, magneto-dynamos, ignition coils, sparking plugs and glow plugs, starter motors); generators (for example, dynamos, alternators) and cut-outs of a kind used in conjunction with such engines',18),(14,'8512','Electrical lighting or signalling equipment (excluding articles of heading 8539), windscreen wipers, defrosters and demisters, of a kind used for cycles or motor vehicles',18),(15,'8513','Portable electric lamps designed to function by their own source of energy (for example, dry batteries, accumulators, magnetos), other than lighting equipment of heading 8512',18),(16,'8514','Industrial or laboratory electric furnaces and ovens (including those functioning by induction or dielectric loss); other industrial or laboratory equipment for the heat treatment of materials by induction or dielectric loss',18),(17,'8515','Electric (including electrically heated gas), laser or other light or photo beam, ultrasonic, electron beam, magnetic pulse or plasma arc soldering, brazing or welding machines and apparatus, whether or not capable of cutting; electric machines and apparatus for hot spraying of metals or cermets',18),(18,'8516','Electric instantaneous or storage water heaters and immersion heaters; electric space heating apparatus and soil heating apparatus; electrothermic hair-dressing apparatus (for example, hair dryers, hair curlers, curling tong heaters) and hand dryers; electric smoothing irons; other electro-thermic appliances of a kind used for domestic purposes; electric heating resistors, other than those of heading 8545',28),(19,'8517','Telephones for cellular networks or for other wireless networks',12),(20,'8517','Telephone sets; other apparatus for the transmission or reception of voice, images or other data, including apparatus for communication in a wired or wireless network (such as a local or wide area network), other than transmission or reception apparatus of heading 8443, 8525, 8527 or 8528',18),(21,'8517','ISDN System [8517 69 10], ISDN Termi- nal Adaptor [8517 69 20], X 25 Pads [8517 69 40]',18),(22,'8518','Microphones and stands therefor; loudspeakers, whether or not mounted in their enclosures [deleted w.e.f : 14/11/2017 other than single loudspeakers, mounted in their enclosures]; headphones and earphones, whether or not combined with a microphone, and sets consisting of a microphone and one or more loudspeakers; (inserted w.e.f : 14/11/2017 : audio-frequency electric amplifiers; electric sound amplifier set)',18),(23,'8519','Sound recording or reproducing apparatus',18),(24,'8521','Video recording or reproducing apparatus, whether or not incorporating a video tuner',18),(25,'8522','Parts and accessories suitable for use solely or principally with the apparatus of headings 8519 or 8521',18),(26,'8523','Discs, tapes, solid-state non-volatile storage devices, ?smart cards? and other media for the recording of sound or of other phenomena, whether or not recorded, including matrices and masters for the production of discs, but excluding products of Chapter 37',18),(27,'8525','Closed-circuit television (CCTV), [inserted w.e.f : 14/11/2017 : transmission apparatus for radio-broadcasting or television, whether or not incorporating reception apparatus or sound recording or reproducing apparatus; television cameras [other than two-way radio (Walkie talkie) used by defence, police and paramilitary forces etc]',18),(28,'8525','Transmission apparatus for radio-broadcasting or television, whether or not incorporating reception apparatus or sound recording or reproducing apparatus; television cameras, digital cameras and video cameras recorders [other than CCTV]',18),(29,'8526','Radar apparatus, radio navigational aid apparatus and radio remote control apparatus',18),(30,'8527','Reception apparatus for radio-broadcasting, whether or not combined, in the same housing, with sound recording or reproducing apparatus or a clock',18),(31,'8528','Computer monitors not exceeding 20 inches, (inserted w.e.f 14/11/2017 : and set top Box for Television (TV)',18),(32,'8528','Monitors and projectors, not incorporating television reception apparatus; reception apparatus for television, whether or not incorporating radio-broadcast receiver or sound or video recording or reproducing apparatus [other than computer monitors not exceeding 20 inches]',18),(33,'8529','Parts suitable for use solely or principally with the apparatus of headings 8525 to 8528',18),(34,'8530','Electrical signalling, safety or traffic control equipment for railways, tramways, roads, inland waterways, parking facilities, port installations or airfields (other than those of heading 8608)',18),(35,'8531','Electric sound or visual signalling apparatus (for example, bells, sirens, indicator panels, burglar or fire alarms), other than those of heading 8512 or 8530',18),(36,'8532','Electrical capacitors, fixed, variable or adjustable (pre-set)',18),(37,'8533','Electrical resistors (including rheostats and potentiometers), other than heating resistors',18),(38,'8535','Electrical apparatus for switching or protecting electrical circuits, or for making connections to or in electrical circuits (for example, switches, fuses, lightning arresters, voltage limiters, surge suppressors, plugs and other connectors, junction boxes), for a voltage exceeding 1,000 volts',18),(39,'8536','Electrical apparatus for switching or protecting electrical circuits, or for making connections to or in electrical circuits (for example, switches, relays, fuses, surge suppressors, plugs, sockets, lamp-holders, and other connectors, junction boxes), for a voltage not exceeding 1,000 volts : connectors for optical fibres optical fibres, bundles or cables',18),(40,'8537','Boards, panels, consoles, desks, cabinets and other bases, equipped with two or more apparatus of heading 8535 or 8536, for electric control or the distribution of electricity, including those incorporating instruments or apparatus of chapter 90, and numerical control apparatus, other than switching apparatus of heading 8517',18),(41,'8538','Parts suitable for use solely or principally with the apparatus of heading 8535, 8536 or 8537',18),(42,'8539','LED lamps',12),(43,'8539','Electrical Filaments or discharge lamps (inserted w.e.f : 14/11/2017 including sealed beam lamp units and ultra-violet or infra-red lamps; arc lamps [other than LED lamps]',18),(44,'8539','Sealed beam lamp units and ultra-violet or infra-red lamps; arc lamps [other than Electric filament or discharge lamps and LED lamps]',18),(45,'8540','Thermionic, cold cathode or photo-cathode valves and tubes (for example, vacuum or vapour or gas filled valves and tubes, mercury arc rectifying valves and tubes, cathode-ray tubes, television camera tubes)',18),(46,'8541','Diodes, transistors and similar semi-conductor devices; photosensitive semi-conductor devices; light-emitting diodes (LED); mounted piezoelectric crystals',18),(47,'8542','Electronic integrated circuits',18),(48,'8543','Electrical machines and apparatus, having individual functions, not specified or included elsewhere in this Chapter',18),(49,'8544','Winding Wires; Coaxial cables; Optical Fiber',18),(50,'8544','Insulated (including enamelled or anodised) wire, cable (inserted w.e.f : 14/11/2017 : including co-axial cable) and other insulated electric conductors, whether or not fitted with connectors, optical fibre cables, made up of individually sheathed fibres, whether or not assembled with electric conductors or fitted with connectors shall be substituted [other than Winding Wires; Coaxial cables; Optical Fiber]',18),(51,'8545','Carbon electrodes (inserted w.e.f : carbon brushes, Lamp carbons, battery carbons and other articles of graphite or other carbon, with or without metal, of a kind used for electrical purposes)',18),(52,'8545','Brushes [85452000] and goods under 8545 (including arc lamp carbon and battery carbon)',18),(53,'8546','Electrical insulators of any material',18),(54,'8547','Insulating fittings for electrical machines, appliances or equipment, being fittings wholly of insulating material apart from any minor components of metal (for example, threaded sockets) incorporated during moulding solely for the purposes of assembly, other than insulators of heading 8546; electrical conduit tubing and joints therefor, of base metal lined with insulating material',18),(55,'8548','Waste and scrap of primary cells, primary batteries and electric accumulators; spent primary cells, spent primary batteries and spent electric accumulators; electrical parts of machinery or apparatus, not specified or included elsewhere in this Chapter',18),(56,'853400','Printed Circuits',18),(57,'852560','Two-way radio (Walkie talkie) used by defence, police and paramilitary forces etc.',12),(58,'852290','Machinery for cleaning or drying bottles or other containers; machinery for filling, closing, sealing or labelling bottles, cans, boxes, bags or other containers; machinery for capsuling bottles, jars, tubes and similar containers; other packing or wrapping machinery (including heat-shrink wrapping machinery); machinery for aerating beverages [other than dish washing machines] [other than 84221100, 84221900]',18),(59,'85','E-waste Explanation: For the purpose of this entry, e-waste meanselectrical and electronic equipment listed in Schedule I of the EWaste (Management) Rules, 2016, published in the Gazette of India vide G.S.R. 338 (E) dated the 23rd March, 2016, including the components, consumables, parts and spares which make these products operational',5),(69,'123','No Description',452);
/*!40000 ALTER TABLE `tbl_hsn_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_hsns`
--

DROP TABLE IF EXISTS `tbl_hsns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_hsns` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `hsn_code` int(11) NOT NULL,
  `description` text NOT NULL,
  `gst` int(11) NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_hsns`
--

LOCK TABLES `tbl_hsns` WRITE;
/*!40000 ALTER TABLE `tbl_hsns` DISABLE KEYS */;
INSERT INTO `tbl_hsns` VALUES (1,208,'Other meat and edible meat offal, frozen and put up in unit containers and put up in unit container and,-?',5),(4,205,'Meat of horses, asses, mules or hinnies, frozen and put up in unit Containers',12),(5,205,'Meat of horses, asses, mules or hinnies, fresh, chilled or frozen [other than frozen and put up in unit container]',0),(6,201,'Meat of bovine animals, fresh and chilled.',0),(7,202,'Meat of bovine animals, frozen and put up in unit containers',12),(8,202,'Meat of bovine animals [other than fresh or chilled] and put up in unit container and,-?',5),(10,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(11,202,'Meat of bovine animals [other than frozen and put up in unit container]',0),(12,203,'Meat of swine, frozen and put up in unit containers',12),(13,203,'Meat of swine [other than fresh or chilled] and put up in unit container and,-?',5),(14,0,'(a) bearing a registered brand name; or?',0),(15,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(16,203,'Meat of swine, fresh, chilled or frozen [other than frozen and put up in unit container]',0),(17,204,'Meat of sheep or goats, frozen and put up in unit containers',12),(18,204,'Meat of sheep or goats [other than fresh or chilled] and put up in unit container and,-?',5),(19,0,'(a) bearing a registered brand name; or?',0),(20,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(21,204,'Meat of sheep or goats, fresh, chilled or frozen [other than frozen and put up in unit container]',0),(22,206,'Edible offal of bovine animals, swine, sheep, goats, horses, asses, mules or hinnies, frozen and put up in unit containers',12),(23,206,'Edible offal of bovine animals, swine, sheep, goats, horses, asses, mules or hinnies [other than fresh or chilled] and put up in unit container and,-?',5),(24,0,'(a) bearing a registered brand name; or?',0),(25,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(26,206,'Edible offal of bovine animals, swine, sheep, goats, horses, asses, mules or hinnies, fresh, chilled or frozen [other than frozen and put up in unit container]',0),(27,207,'Meat and edible offal, of the poultry of heading 0105, frozen and put up in unit containers',12),(28,207,'Meat and edible offal, of the poultry of heading 0105[other than fresh or chilled] and put up in unit container and,-?',5),(29,0,'(a) bearing a registered brand name; or?',0),(30,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(31,207,'Meat and edible offal, of the poultry of heading 0105, fresh, chilled or frozen [other than frozen and put up in unit container]',0),(32,208,'Other meat and edible meat offal, frozen and put up in unit containers',12),(33,208,'Other meat and edible meat offal, fresh, chilled or frozen [other than frozen and put up in unit container]',0),(34,209,'Pig fat, free of lean meat, and poultry fat, not rendered or otherwise extracted, frozen and put up in unit containers',12),(35,209,'Pig fat, free of lean meat, and poultry fat, not rendered or otherwise extracted, salted, in brine, dried or smoked, put up in unit containers',12),(36,209,'Pig fat, free of lean meat, and poultry fat, not rendered or otherwise extracted, fresh, chilled or frozen [other than frozen and put up in unit container]',0),(37,209,'Pig fat, free of lean meat, and poultry fat and put up in unit containers and put up in unit container and,-',5),(38,0,'(a) bearing a registered brand name; or',0),(39,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(40,210,'Meat and edible meat offal, salted, in brine, dried or smoked put up in unit containers; edible flours and meals of meat or meat offal put up in unit containers',5),(41,211,'Meat and edible meat offal, salted, in brine, dried or smoked; edible flours and meals of meat or meat offal, other than put up in unit containers',0),(42,208,'Other meat and edible meat offal, frozen and put up in unit containers and put up in unit container and,-?',5),(43,0,'(a) bearing a registered brand name; or?',0),(44,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(45,205,'Meat of horses, asses, mules or hinnies, frozen and put up in unit Containers',12),(46,205,'Meat of horses, asses, mules or hinnies, fresh, chilled or frozen [other than frozen and put up in unit container]',0),(47,201,'Meat of bovine animals, fresh and chilled.',0),(48,202,'Meat of bovine animals, frozen and put up in unit containers',12),(49,202,'Meat of bovine animals [other than fresh or chilled] and put up in unit container and,-?',5),(50,0,'(a) bearing a registered brand name; or?',0),(51,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(52,202,'Meat of bovine animals [other than frozen and put up in unit container]',0),(53,203,'Meat of swine, frozen and put up in unit containers',12),(54,203,'Meat of swine [other than fresh or chilled] and put up in unit container and,-?',5),(55,0,'(a) bearing a registered brand name; or?',0),(56,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(57,203,'Meat of swine, fresh, chilled or frozen [other than frozen and put up in unit container]',0),(58,204,'Meat of sheep or goats, frozen and put up in unit containers',12),(59,204,'Meat of sheep or goats [other than fresh or chilled] and put up in unit container and,-?',5),(60,0,'(a) bearing a registered brand name; or?',0),(61,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(62,204,'Meat of sheep or goats, fresh, chilled or frozen [other than frozen and put up in unit container]',0),(63,206,'Edible offal of bovine animals, swine, sheep, goats, horses, asses, mules or hinnies, frozen and put up in unit containers',12),(64,206,'Edible offal of bovine animals, swine, sheep, goats, horses, asses, mules or hinnies [other than fresh or chilled] and put up in unit container and,-?',5),(65,0,'(a) bearing a registered brand name; or?',0),(66,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(67,206,'Edible offal of bovine animals, swine, sheep, goats, horses, asses, mules or hinnies, fresh, chilled or frozen [other than frozen and put up in unit container]',0),(68,207,'Meat and edible offal, of the poultry of heading 0105, frozen and put up in unit containers',12),(69,207,'Meat and edible offal, of the poultry of heading 0105[other than fresh or chilled] and put up in unit container and,-?',5),(70,0,'(a) bearing a registered brand name; or?',0),(71,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(72,207,'Meat and edible offal, of the poultry of heading 0105, fresh, chilled or frozen [other than frozen and put up in unit container]',0),(73,208,'Other meat and edible meat offal, frozen and put up in unit containers',12),(74,208,'Other meat and edible meat offal, fresh, chilled or frozen [other than frozen and put up in unit container]',0),(75,209,'Pig fat, free of lean meat, and poultry fat, not rendered or otherwise extracted, frozen and put up in unit containers',12),(76,209,'Pig fat, free of lean meat, and poultry fat, not rendered or otherwise extracted, salted, in brine, dried or smoked, put up in unit containers',12),(77,209,'Pig fat, free of lean meat, and poultry fat, not rendered or otherwise extracted, fresh, chilled or frozen [other than frozen and put up in unit container]',0),(78,209,'Pig fat, free of lean meat, and poultry fat and put up in unit containers and put up in unit container and,-',5),(79,0,'(a) bearing a registered brand name; or',0),(80,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(81,210,'Meat and edible meat offal, salted, in brine, dried or smoked put up in unit containers; edible flours and meals of meat or meat offal put up in unit containers',5),(82,211,'Meat and edible meat offal, salted, in brine, dried or smoked; edible flours and meals of meat or meat offal, other than put up in unit containers',0),(83,301,'Live fish.',0),(84,302,'Fish, fresh or chilled, excluding fish fillets and other fish meat of heading 0304',0),(85,303,'Fish, frozen, excluding fish fillets and other fish meat of heading 0304 ( inserted w.e.f 14/11/2017 : and put up in unit container and,-?',0),(86,0,'(a) bearing a registered brand name; or?',0),(87,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(88,304,'Fish fillets and other fish meat (whether or not minced), frozen ( inserted w.e.f 14/11/2017: and put up in unit container and,-?',5),(89,0,'(a) bearing a registered brand name; or?',0),(90,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(91,304,'Fish fillets and other fish meat (whether or not minced), fresh or chilled.',0),(92,305,'Fish, dried, salted or in brine; smoked fish, whether or not cooked before or during the smoking process; flours, meals and pellets of fish, fit for human consumption (inserted w.e.f 14/11/2017 : and put up in unit container and,-?',5),(93,0,'(a) bearing a registered brand name; or?',0),(94,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE',0),(95,305,'Fish dried (not put up in unit container bearing a brand name)',0),(96,306,'Crustaceans, whether in shell or not, frozen, dried, salted or in brine; crustaceans, in shell, cooked by steaming or by boiling in water, frozen, dried, salted or in brine; flours, meals and pellets of crustaceans, fit for human consumption (inserted w.e.f 14/11/2017 : and put up in unit container and,-?',5),(97,0,'(a) bearing a registered brand name; or?',0),(98,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(99,306,'Crustaceans, whether in shell or not, live, fresh or chilled; crustaceans, in shell, cooked by steaming or by boiling in water live, fresh or chilled.',0),(100,307,'Molluscs, whether in shell or not, frozen, dried, salted or in brine; aquatic invertebrates other than crustaceans and molluscs, frozen, dried, salted or in brine; flours, meals and pellets of aquatic invertebra other than crustaceans, fit for human consumption (inserted w.e.f 14/11/2017 : and put up in unit container and,-?',5),(101,0,'(a) bearing a registered brand name; or?',0),(102,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(103,307,'Molluscs, whether in shell or not, live, fresh, chilled; aquatic invertebrates other than crustaceans and molluscs, live, fresh or chilled.',0),(104,308,'Aquatic invertebrates other than crustaceans and molluscs, frozen, dried, salted or in brine; smoked aquatic invertebrates other than crustaceans and molluscs, whether or not cooked before or during the smoking process: flours, meals and pellets of aquatic invertebrates other than crustaceans and molluscs, fit for human consumption (inserted w.e.f 14/11/2017 : and put up in unit container and,-?',5),(105,0,'(a) bearing a registered brand name; or?',0),(106,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(107,308,'Aquatic invertebrates other than crustaceans and molluscs, live, fresh or chilled.',0),(108,3,'Fish seeds, prawn / shrimp seeds whether or not processed, cured or in frozen state [other than goods falling under Chapter 3 and attracting 5%]',0),(109,409,'Natural honey, put up in unit container and bearing a registered brand name',5),(110,409,'Natural honey, other than put up in unit container and bearing a registered brand name',0),(111,401,'Ultra High Temperature (UHT) milk',5),(112,401,'Fresh milk and pasteurised milk, including separated milk, milk and cream, not concentrated nor containing added sugar or other sweetening matter, excluding Ultra High Temperature (UHT) milk',0),(113,402,'Milk and cream, concentrated or containing added sugar or other sweetening matter, including skimmed milk powder, milk food for babies [other than condensed milk]',5),(114,403,'Cream, yogurt, kephir and other fermented or acidified milk and cream, whether or not concentrated or containing added sugar or other sweetening matter or flavoured or containing added fruit, nuts or cocoa',5),(115,403,'Curd; Lassi; Butter milk',0),(116,404,'Whey, whether or not concentrated or containing added sugar or other sweetening matter; products consisting of natural milk constituents, whether or not containing added sugar or other sweetening matter, not elsewhere specified or included',5),(117,405,'Butter and other fats (i.e. ghee, butter oil, etc.) and oils derived from milk; dairy spreads',12),(118,406,'Chena or paneer put up in unit container and bearing a registered brand name',5),(119,406,'Cheese',12),(120,406,'Chena or paneer, other than put up in unit containers and bearing a registered brand name;',0),(121,407,'Birds\' eggs, in shell, fresh, preserved or cooked',0),(122,408,'Birds\' eggs, not in shell, and egg yolks, fresh, dried, cooked by steaming or by boiling in water, moulded, frozen or otherwise preserved, whether or not containing added sugar or other sweet- ening matter.',5),(123,410,'Edible products of animal origin, not elsewhere specified or included',5),(124,4029920,'Condensed milk',12),(125,4029110,'Condensed milk',12),(126,501,'Human hair, unworked, whether or not washed or scoured; waste of human hair',0),(127,502,'Pigs\', hogs\' or boars\' bristles and hair; badger hair and other brush making hair; waste of such bristles or hair.',5),(128,504,'Guts, bladders and stomachs of animals (other than fish), whole and pieces thereof, fresh, chilled, frozen, salted, in brine, dried or smoked (inserted w.e.f 14/11/2017 : and put up in unit container and,-?',5),(129,0,'(a) bearing a registered brand name; or?',0),(130,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(131,505,'Skins and other parts of birds, with their feathers or down, feathers and parts of feathers (whether or not with trimmed edges) and down, not further worked than cleaned, disinfected or treated for preservation; powder and waste of feathers or parts of feathers',5),(132,506,'All goods i.e. Bones and horn-cores, unworked, defatted, simply prepared (but not cut to shape), treated with acid or gelatinised; powder and waste of these products',0),(133,507,'Ivory, tortoise-shell, whalebone and whalebone hair, horns, unworked or simply prepared but not cut to shape; powder and waste of these products. [Except 050790]',5),(134,508,'Coral and similar materials, unworked or simply prepared but not otherwise worked; shells of molluscs, crustaceans or echinoderms and cuttle-bone, unworked or simply prepared but not cut to shape, powder and waste thereof.',5),(135,510,'Ambergris, castoreum, civet and musk; cantharides; bile, whether or not dried; glands and other animal products used in the preparation of pharmaceutical products, fresh, chilled, frozen or otherwise provisionally preserved.',5),(136,511,'Animal products not elsewhere specified or included; dead animals of Chapter 1 or 3, unfit for human consumption, other than semen including frozen semen.',5),(137,511,'Semen including frozen semen',0),(138,50790,'All goods i.e. Hoof meal; horn meal; hooves, claws, nails and beaks; antlers; etc.',0),(139,6,'Live trees and other plants; bulbs, roots and the like; cut flowers and ornamental foliage',0),(140,702,'Tomatoes, fresh or chilled.',0),(141,707,'Cucumbers and gherkins, fresh or chilled.',0),(142,701,'Potatoes, fresh or chilled.',0),(143,703,'Onions, shallots, garlic, leeks and other alliaceous vegetables, fresh or chilled.',0),(144,704,'Cabbages, cauliflowers, kohlrabi, kale and similar edible brassicas, fresh or chilled.',0),(145,705,'Lettuce (Lactuca sativa) and chicory (Cichorium spp.), fresh or chilled.',0),(146,706,'Carrots, turnips, salad beetroot, salsify, celeriac, radishes and similar edible roots, fresh or chilled.',0),(147,708,'Leguminous vegetables, shelled or unshelled, fresh or chilled.',0),(148,709,'Other vegetables, fresh or chilled.',0),(149,710,'Vegetables (uncooked or cooked by steaming or boiling in water), frozen (inserted w.e.f 14/11/2017 : and put up in unit container and,-?',5),(150,0,'(a) bearing a registered brand name; or?',0),(151,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(152,711,'Vegetables provisionally preserved (for example, by sulphur dioxide gas, in brine, in sulphur water or in other preservative solutions), but unsuitable in that state for immediate consumption',5),(153,712,'Dried vegetables, whole, cut, sliced, broken or in powder, but not further prepared.',0),(154,713,'Dried leguminous vegetables, shelled, whether or not skinned or split [put up in unit container and bearing a registered brand name]',5),(155,713,'Dried leguminous vegetables, shelled, whether or not skinned or split.',0),(156,714,'Manioc, arrowroot, salep, Jerusalem artichokes, sweet potatoes and similar roots and tubers with high starch or inulin content, frozen or dried, whether or not sliced or in the form of pellets (inserted w.e.f 14/11/2017 : and put up in unit container and,-?',0),(157,0,'(a) bearing a registered brand name; or?',0),(158,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE]',0),(159,714,'Manioc, arrowroot, salep, Jerusalem artichokes, sweet potatoes and similar roots and tubers with high starch or inulin content, fresh or chilled; sago pith.',0),(160,7,'Herb, bark, dry plant, dry root, commonly known as jaribooti and dry flower',5),(161,0,'',0),(162,814,'Peel of citrus fruit or melons (including watermelons), frozen, dried or provisionally preserved in brine, in sulphur water or in other preservative solutions',5),(163,814,'Peel of citrus fruit or melons (including watermelons), fresh.',0),(164,801,'Cashewnuts, whether or not shelled or peeled, (inserted w.e.f 14/11/2017 : desiccated coconuts',5),(165,801,'Brazil nuts, dried, whether or not shelled or peeled',12),(166,801,'Coconuts, fresh or dried, whether or not shelled or peeled',0),(167,801,'Brazil nuts, fresh, whether or not shelled or peeled',0),(168,802,'Dried areca nuts, whether or not shelled or peeled',5),(169,802,'Dried chestnuts (singhada), whether or not shelled or peeled',5),(170,802,'Other nuts, dried, whether or not shelled or peeled, such as Almonds, Hazel nuts or filberts (Coryius spp.), Chestnuts (Castanea spp.), Pistachios, Macadamia nuts, Kola nuts (Cola spp.) [other than dried areca nuts]',12),(171,802,'Other nuts, Other nuts, fresh such as Almonds, Hazelnuts or filberts (Coryius spp.), walnuts, Chestnuts (Castanea spp.), Pistachios, Macadamia nuts, Kola nuts (Cola spp.), Areca nuts, fresh, whether or not shelled or peeled',0),(172,802,'Walnuts, whether or not shelled',5),(173,803,'Bananas, including plantains, fresh or dried',0),(174,804,'Mangoes sliced, dried',5),(175,804,'Dates (soft or hard), figs, pineapples, avocados, guavas, and mangosteens, dried',12),(176,804,'Dates, figs, pineapples, avocados, guavas, mangoes and mangosteens, fresh.',0),(177,805,'Citrus fruit, such as Oranges, Mandarins (including tangerines and satsumas); clementines, wilkings and similar citrus hybrids, Grapefruit, including pomelos, Lemons (Citrus limon, Citrus limonum) and limes (Citrus aurantifolia, Citrus latifolia), fresh.',0),(178,806,'Grapes, dried, and raisins',5),(179,806,'Grapes, fresh',0),(180,807,'Melons (including watermelons) and papaws (papayas), fresh.',0),(181,808,'Apples, pears and quinces, fresh.',0),(182,809,'Apricots, cherries, peaches (including nectarines), plums and sloes, fresh.',0),(183,810,'Other fruit such as strawberries, raspberries, blackberries, mulberries and loganberries, black, white or red currants and gooseberries, cranberries, bilberries and other fruits of the genus vaccinium, Kiwi fruit, Durians, Persimmons, Pomegranates, Tamarind, Sapota (chico), Custard-apple (ata), Bore, Lichi, fresh.',0),(184,811,'Fruit and nuts, uncooked or cooked by steaming or boiling in water, frozen, whether or not containing added sugar or other sweetening matter',5),(185,812,'Fruit and nuts, provisionally preserved (for example, by Sulphur dioxide gas, in brine, in sulphur water or in other preservative solutions), but unsuitable in that state for immediate consumption',5),(186,813,'Tamarind, dried',5),(187,813,'Fruit, dried, other than that of headings 0801 to 0806; mixtures of nuts or dried fruits of Chapter 8 [other than dried tamarind and dried chestnut(singhada) whether or not shelled or pelled]',12),(188,8,'Dried makhana, whether or not shelled or peeled (inserted w.e.f : 14/11/2017 : put up in unit container and,-?',5),(189,0,'(a) bearing a registered brand name; or?',0),(190,0,'(b) bearing a brand name on which an actionable claim or enforceable right in a court of law is available [other than those where any actionable claim or enforceable right in respect of such brand name has been foregone voluntarily], subject to the conditions as in the ANNEXURE',0);
/*!40000 ALTER TABLE `tbl_hsns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_image_paths`
--

DROP TABLE IF EXISTS `tbl_image_paths`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_image_paths` (
  `path_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `path_name` varchar(50) NOT NULL,
  PRIMARY KEY (`path_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_image_paths`
--

LOCK TABLES `tbl_image_paths` WRITE;
/*!40000 ALTER TABLE `tbl_image_paths` DISABLE KEYS */;
INSERT INTO `tbl_image_paths` VALUES (1,'products','/images/products/'),(2,'datasheets','/images/datasheets/');
/*!40000 ALTER TABLE `tbl_image_paths` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_item_master`
--

DROP TABLE IF EXISTS `tbl_item_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_item_master` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(50) NOT NULL,
  `hsn_code` varchar(11) NOT NULL,
  `mrp_price` decimal(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `gst` int(11) NOT NULL,
  `description` text NOT NULL,
  `is_active` enum('1','0') NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_item_master`
--

LOCK TABLES `tbl_item_master` WRITE;
/*!40000 ALTER TABLE `tbl_item_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_item_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_mac_ids`
--

DROP TABLE IF EXISTS `tbl_mac_ids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_mac_ids` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `mac_id` varchar(12) NOT NULL,
  `order_item_id` int(5) NOT NULL,
  `product_id` int(11) NOT NULL,
  `dealer_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(5) NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_mac_ids`
--

LOCK TABLES `tbl_mac_ids` WRITE;
/*!40000 ALTER TABLE `tbl_mac_ids` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_mac_ids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_mac_log`
--

DROP TABLE IF EXISTS `tbl_mac_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_mac_log` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(25) NOT NULL,
  `mac_id` varchar(25) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_on` date NOT NULL,
  `changed_on` date NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_mac_log`
--

LOCK TABLES `tbl_mac_log` WRITE;
/*!40000 ALTER TABLE `tbl_mac_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_mac_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_members`
--

DROP TABLE IF EXISTS `tbl_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_members` (
  `member_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `gstin` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(15) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `phone_no` varchar(25) NOT NULL,
  `country_code` varchar(25) NOT NULL,
  `path_id` int(5) NOT NULL,
  `profile_logo` varchar(50) NOT NULL,
  `role` enum('ADMIN','DEALER') NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(5) NOT NULL,
  `reset_token` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_members`
--

LOCK TABLES `tbl_members` WRITE;
/*!40000 ALTER TABLE `tbl_members` DISABLE KEYS */;
INSERT INTO `tbl_members` VALUES (1,'Raghu','Madhu','Dandu','admin@gmail.com','123456','123456','','','<p>\r\n\r\n</p><strong></strong><b>VSCI-E Technologies</b><div><strong></strong>Pavani Apartments,</div><div>Beside TCS,</div><div>Santhipura Road,</div><div>Electronic City Phase-2,</div><div>Bangalore-560100<p><strong></strong></p>\r\n\r\n<p></p></div>','','','','(999) 999-9999','IN',0,'raghu.jpg','ADMIN','0000-00-00 00:00:00',0,'057269',1),(2,'Raghu','Khaja','Shaik','dealer@gmail.com','123456','123456','My3Decors','','Moosapet','Hyderabad','KA','500018','9989875983','IN',0,'raghu.jpg','DEALER','2017-12-28 16:02:16',0,'',1),(3,'Gopinadh','Gopinadh','Dandu','gopi@mydwayz.com','123456','123456','My3Decors','','<p>\r\n\r\n<strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. tthr<br></p>','','AP','','(888) 888-8888','IN',0,'gopinadh.jpg','DEALER','2017-12-28 16:13:09',0,'',1),(4,'naresh','naresh','babu','naresh@mydwayz.com','123456','123456','Mydwayz','','<p>good sbxcjasbxuibhjkb jkbxsioj?hohnn cdisn kl<b></b><i></i><u></u><br></p>','','TS','','(888) 888-8888','IN',0,'naresh.jpg','DEALER','2018-01-02 13:25:59',0,'',1);
/*!40000 ALTER TABLE `tbl_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_order_items`
--

DROP TABLE IF EXISTS `tbl_order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_order_items` (
  `order_item_id` int(5) NOT NULL AUTO_INCREMENT,
  `order_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `mac_id` varchar(50) NOT NULL,
  `quantity` int(5) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `amnt_aft_discount` decimal(10,2) NOT NULL,
  `cgst_amount` decimal(10,2) NOT NULL,
  `sgst_amount` decimal(10,2) NOT NULL,
  `igst_amount` decimal(10,2) NOT NULL,
  `discount_amount` varchar(10) NOT NULL,
  `tax_amount` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_order_items`
--

LOCK TABLES `tbl_order_items` WRITE;
/*!40000 ALTER TABLE `tbl_order_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_orders`
--

DROP TABLE IF EXISTS `tbl_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_orders` (
  `order_id` int(5) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(20) NOT NULL,
  `reference_no` varchar(20) NOT NULL,
  `order_date` date NOT NULL,
  `order_type` enum('PRODUCT','CUSTOM') NOT NULL,
  `expected_date` date NOT NULL,
  `delivery_within` varchar(20) NOT NULL,
  `remarks` text NOT NULL,
  `sub_amount` decimal(10,2) NOT NULL,
  `net_amount` decimal(10,2) NOT NULL,
  `cgst_amount` decimal(10,2) NOT NULL,
  `sgst_amount` decimal(10,2) NOT NULL,
  `igst_amount` decimal(10,2) NOT NULL,
  `tax_amount` decimal(10,2) NOT NULL,
  `discount_total` decimal(10,2) NOT NULL,
  `final_total` decimal(10,2) NOT NULL,
  `text_amount` varchar(100) NOT NULL,
  `mac_id` varchar(25) NOT NULL,
  `order_status` enum('PENDING','PROGRESS','DELIVERED') NOT NULL,
  `created_on` datetime NOT NULL,
  `created_by` int(5) NOT NULL,
  `approved_by` int(5) NOT NULL,
  `approved_on` datetime NOT NULL,
  `user_id` int(5) NOT NULL,
  `user_address` text NOT NULL,
  `user_state` varchar(20) NOT NULL,
  `user_city` varchar(20) NOT NULL,
  `user_phone_no` varchar(20) NOT NULL,
  `user_company` varchar(50) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_pincode` varchar(10) NOT NULL,
  `dealer_id` int(5) NOT NULL,
  `dealer_address` text NOT NULL,
  `dealer_email` varchar(100) NOT NULL,
  `dealer_phone` varchar(20) NOT NULL,
  `dealer_name` varchar(50) NOT NULL,
  `dealer_company` varchar(50) NOT NULL,
  `company_address` text NOT NULL,
  `admin_visible` enum('0','1') NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_orders`
--

LOCK TABLES `tbl_orders` WRITE;
/*!40000 ALTER TABLE `tbl_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_product_info`
--

DROP TABLE IF EXISTS `tbl_product_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_product_info` (
  `product_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(5) NOT NULL,
  `mfr_no` varchar(30) NOT NULL,
  `hsn_code` varchar(20) NOT NULL,
  `datasheet_path_id` int(11) NOT NULL,
  `datasheet` varchar(100) NOT NULL,
  `mrp_price` decimal(10,2) NOT NULL,
  `gst` varchar(10) NOT NULL,
  `gst_amount` decimal(10,2) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `has_mac_id` tinyint(1) NOT NULL,
  `description_1` text NOT NULL,
  `description_2` text NOT NULL,
  `description_3` text NOT NULL,
  `demo_text` text NOT NULL,
  `demo_video_type` enum('VIDEO','YOUTUBE') NOT NULL,
  `demo_video` text NOT NULL,
  `path_id` int(5) NOT NULL,
  `is_active` enum('1','0') NOT NULL,
  PRIMARY KEY (`product_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_product_info`
--

LOCK TABLES `tbl_product_info` WRITE;
/*!40000 ALTER TABLE `tbl_product_info` DISABLE KEYS */;
INSERT INTO `tbl_product_info` VALUES (21,3,'12345','4646',0,'hkhkj',7000.00,'18',0.00,'','10',0,'adhsakdhaksdhsa','','','','VIDEO','',0,'1'),(22,4,'12345','4646',0,'hkhkj',6000.00,'18',0.00,'','10',0,'adhsakdhaksdhsa','','','','VIDEO','',0,'1'),(23,5,'12345','4646',0,'hkhkj',5000.00,'18',0.00,'','10',0,'adhsakdhaksdhsa','','','','VIDEO','',0,'1'),(24,7,'12345','789456',0,'/sakdhsakh',20000.00,'28',0.00,'','15',1,'sdjasljdaldj as dosajd','','','','VIDEO','',0,'1'),(25,9,'12345','852',0,'sadsadsasadsa/dsad',15000.00,'28',0.00,'','15',1,'jdhakshdakshdsakjd','','','','VIDEO','',0,'1'),(26,11,'12345','123',0,'print13.pdf',10000.00,'28',0.00,'','15',1,'<p>Test Discription</p>','','','','VIDEO','',0,'1'),(27,12,'','',0,'',0.00,'',0.00,'','',0,'','','','','VIDEO','',0,'1');
/*!40000 ALTER TABLE `tbl_product_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_products` (
  `product_id` int(5) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_url` text NOT NULL,
  `parent_id` int(5) NOT NULL,
  `path_id` int(5) NOT NULL,
  `product_logo` varchar(50) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keywords` varchar(255) NOT NULL,
  `seo_description` varchar(255) NOT NULL,
  `order_no` int(5) NOT NULL,
  `created_on` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_products`
--

LOCK TABLES `tbl_products` WRITE;
/*!40000 ALTER TABLE `tbl_products` DISABLE KEYS */;
INSERT INTO `tbl_products` VALUES (1,'product-1','',0,0,'','','','',0,'2019-05-18 21:16:38',1),(2,'switchboard','',1,0,'dfsfds','','','',0,'2019-05-18 21:16:38',1),(3,'p7+1','#',2,0,'/sakdhsakh','','','',0,'2019-05-18 21:16:38',1),(4,'p5+1','#',2,0,'/sakdhsakh','','','',0,'2019-05-18 21:16:38',1),(5,'p4+1','#',2,0,'/sakdhsakh','','','',0,'2019-05-18 21:16:38',1),(6,'server','',1,0,'/sakdhsakh','','','',0,'2019-05-18 21:16:38',1),(7,'sr3110','#',6,0,'/sakdhsakh','','','',0,'2019-05-18 21:16:39',1),(8,'product-2','',0,0,'','','','',0,'2019-05-18 21:16:39',1),(9,'sr2110','#',6,0,'/dsfsdfsdfds','','','',0,'2019-05-18 21:16:39',1),(10,'product-3','',0,0,'','','','',0,'2019-05-18 21:16:39',1),(11,'sr1110','#',6,0,'sub-product2019-04-26.png','','','',0,'2019-05-18 21:16:39',1),(12,'sr2111','#',6,0,'','','','',0,'2019-05-18 21:22:46',1);
/*!40000 ALTER TABLE `tbl_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ranges`
--

DROP TABLE IF EXISTS `tbl_ranges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ranges` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `value_range` varchar(25) NOT NULL,
  `dealer_price` decimal(10,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ranges`
--

LOCK TABLES `tbl_ranges` WRITE;
/*!40000 ALTER TABLE `tbl_ranges` DISABLE KEYS */;
INSERT INTO `tbl_ranges` VALUES (25,'1-10',7000.00,3),(26,'100-200',0.00,3),(27,'1-10',6000.00,4),(28,'200-300',0.00,4),(29,'1-10',5000.00,5),(30,'1-10',20000.00,7),(31,'1-10',15000.00,9),(32,'1-10',10000.00,11),(33,'0-0',0.00,12);
/*!40000 ALTER TABLE `tbl_ranges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sequence_prefix`
--

DROP TABLE IF EXISTS `tbl_sequence_prefix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sequence_prefix` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `prefix` varchar(20) NOT NULL,
  `gstin` varchar(30) NOT NULL,
  `series_start` int(11) NOT NULL DEFAULT '1',
  `total_orders` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `is_active` enum('1','0') NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sequence_prefix`
--

LOCK TABLES `tbl_sequence_prefix` WRITE;
/*!40000 ALTER TABLE `tbl_sequence_prefix` DISABLE KEYS */;
INSERT INTO `tbl_sequence_prefix` VALUES (1,1,'AAAA','',5,0,0,'2018-02-12 07:54:18','1'),(2,2,'HYD','',15,0,0,'2018-02-12 07:54:18','1');
/*!40000 ALTER TABLE `tbl_sequence_prefix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_site_info`
--

DROP TABLE IF EXISTS `tbl_site_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_site_info` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `web_url` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_mail_send` tinyint(1) NOT NULL,
  `state` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `agreement` text NOT NULL,
  `privacy_policy` text NOT NULL,
  `about_us` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `google_map` text NOT NULL,
  `logo` varchar(50) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `path_id` int(5) NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_site_info`
--

LOCK TABLES `tbl_site_info` WRITE;
/*!40000 ALTER TABLE `tbl_site_info` DISABLE KEYS */;
INSERT INTO `tbl_site_info` VALUES (1,'http://vscietechnologies.com/','info@vscietechnologies.com',0,'KA','<p>\r\n\r\n</p><p></p><p><strong></strong><b>VSCIE Technologies,</b></p><p>Pavani Apartment,<br>Beside TCS,<br>Santhipura Road,<br>Electronic City, Phase-2,<br>Bangalore-560100.<strong></strong></p><p></p><p></p>','<p>\r\n\r\nThe Services may give you the ability to access content, such as music or video services, television or other material, controlled or provided by third parties (\"Third-Party Content\"). You understand and acknowledge that: (a) Third-Party Content remains the property of the applicable third parties, who have the sole right to determine your rights to use such content; (b)is not responsible for, and has no editorial control over, any Third-Party Content, and does not sponsor or endorse any such content; and (c)has no control over the distribution of Third-Party Content. You agree that will have no liability to you or to any third parties, including without limitation to anyone else who uses yourSystem, related to or arising out of to any Third-Party Content. You also agree that neither the Services will not be used to illegally copy, display or otherwise make use of Third-Party Content without authorization from the appropriate rights holder or in violation of applicable law. Unauthorized copying or distribution of copyrighted or trademarks may constitute an infringement of the copyright or trademark holders\' intellectual property rights. In addition, steps intended to defeat or bypass security measures designed to prevent infringement of the intellectual property rights of others may be illegal under U.S. law or comparable foreign laws. reserves the right to terminate your right to access and use the Services and delete your account if believes in good faith that you have used the Services or your System to infringe upon the intellectual property rights of others. 6. Subscription Fees and Payment; Taxes e illegal under U.S. law or comparable foreign laws. reserves the right to terminate your right to access and use the Services and delete your account if believes in good faith that you have used the Services or your System to infringe upon the intellectual property rights of others. 6. Subscription Fees and Payment; Taxes e illegal under U.S. law or comparable foreign laws. reserves the right to terminate your right to access and use the Services and delete your account if believes in good faith that you have used the Services or your System to infringe upon the intellectual property rights of others. 6. Subscription Fees and Payment; Taxes\r\n\r\n<br></p>','<p>\r\n\r\nThe Services may give you the ability to access content, such as music or video services, television or other material, controlled or provided by third parties (\"Third-Party Content\"). You understand and acknowledge that: (a) Third-Party Content remains the property of the applicable third parties, who have the sole right to determine your rights to use such content; (b)is not responsible for, and has no editorial control over, any Third-Party Content, and does not sponsor or endorse any such content; and (c)has no control over the distribution of Third-Party Content. You agree that will have no liability to you or to any third parties, including without limitation to anyone else who uses yourSystem, related to or arising out of to any Third-Party Content. You also agree that neither the Services will not be used to illegally copy, display or otherwise make use of Third-Party Content without authorization from the appropriate rights holder or in violation of applicable law. Unauthorized copying or distribution of copyrighted or trademarks may constitute an infringement of the copyright or trademark holders\' intellectual property rights. In addition, steps intended to defeat or bypass security measures designed to prevent infringement of the intellectual property rights of others may be illegal under U.S. law or comparable foreign laws. reserves the right to terminate your right to access and use the Services and delete your account if believes in good faith that you have used the Services or your System to infringe upon the intellectual property rights of others. 6. Subscription Fees and Payment; Taxes e illegal under U.S. law or comparable foreign laws. reserves the right to terminate your right to access and use the Services and delete your account if believes in good faith that you have used the Services or your System to infringe upon the intellectual property rights of others. 6. Subscription Fees and Payment; Taxes e illegal under U.S. law or comparable foreign laws. reserves the right to terminate your right to access and use the Services and delete your account if believes in good faith that you have used the Services or your System to infringe upon the intellectual property rights of others. 6. Subscription Fees and Payment; Taxes\r\n\r\n<br></p>','<p>VSCI-E is product realization company providing end-to-end solutions in the embedded Domain. We offer professional design services which includes hardware and Software Development, customizable product design and Systems Engineering Solutions that improve quality and accelerate time-to-market for a broad range of embedded systems.</p><p>Established in 2001, VSCI-E products and services have over the years heralded the use of latest technologies across a wide spectrum of domains like defense, Semiconductor, Wireless, Automotive, Consumer Electronics, Medical and Industrial Applications.<br><br>Housing the best minds in the industry, VSCI-E has a large team of Engineers, System Engineering Experts and support Engineers. VSCI-E has the finest technology Solutions based on the world\'s best platform viz., Analog Devices, Texas Instruments, Microsoft, Freescale Semiconductors, Atmel AVR, Philips, Microchip, Holtek Semiconductors, ARM, SiLabs, Zilog, ST Microelectronics and Cypress PSoc among others.&nbsp;</p><h3><b>Our Mission&nbsp;</b></h3><p>To be a leading product realization company in the field of Designing products and providing Services for end-to-end embedded solutions for technologies of the future. Through technological innovation, quality and timely deliveries, we want to ensure increased value and a better return on investment to our Customers.<br></p>','VSCI-E is product realization company providing end-to-end solutions in the embedded Domain.','VSCI-E , product realization, embedded, Domain,Systems, Engineering, Solutions','<p><a target=\"_blank\" rel=\"nofollow\" href=\"https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d124443.31289012384!2d77.64161112772624!3d12.91...&lt;/a&gt;\"></a><a target=\"_blank\" rel=\"nofollow\" href=\"https://www.google.co.in/maps/place/VSCI-E+Technologies/@12.8413852,77.6834923,17z/data=!3m1!4b1!4m5!3m4!1s0x3bae6cf72db733db:0xca5abad5197568a0!8m2!3d12.84138!4d77.685681?hl=en\">https://www.google.co.in/maps/place/VSCI-E+Technologies/@12.8413852,77.6834923,17z/data=!3m1!4b1!4m5...</a></p>','Logo.png','#','#','#','#',0);
/*!40000 ALTER TABLE `tbl_site_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_states`
--

DROP TABLE IF EXISTS `tbl_states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_states` (
  `pk_id` int(11) NOT NULL AUTO_INCREMENT,
  `gst_code` varchar(5) NOT NULL,
  `state_code` varchar(5) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  PRIMARY KEY (`pk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_states`
--

LOCK TABLES `tbl_states` WRITE;
/*!40000 ALTER TABLE `tbl_states` DISABLE KEYS */;
INSERT INTO `tbl_states` VALUES (1,'01','JK','Jammu & Kashmir'),(2,'02','HP','Himachal Pradesh'),(3,'03','PB','Punjab'),(4,'04','CH','Chandigarh'),(5,'05','UT','Uttranchal'),(6,'06','HR','Haryana'),(7,'07','DL','Delhi'),(8,'08','RJ','Rajasthan'),(9,'09','UP','Uttar Pradesh'),(10,'10','BH','Bihar'),(11,'11','SK','Sikkim'),(12,'12','AR','Arunachal Pradesh'),(13,'13','NL','Nagaland'),(14,'14','MN','Manipur'),(15,'15','MI','Mizoram'),(16,'16','TR','Tripura'),(17,'17','ME','Meghalaya'),(18,'18','AS','Assam'),(19,'19','WB','West Bengal'),(20,'20','JH','Jharkhand'),(21,'21','OR','Odisha (Formerly Orissa)'),(22,'22','CT','Chhattisgarh'),(23,'23','MP','Madhya Pradesh'),(24,'24','GJ','Gujarat'),(25,'25','DD','Daman & Diu'),(26,'26','DN','Dadra & Nagar Haveli'),(27,'27','MH','Maharashtra'),(28,'28','AP','Andhra Pradesh'),(29,'29','KA','Karnataka'),(30,'30','GA','Goa'),(31,'31','LD','Lakshdweep'),(32,'32','KL','Kerala'),(33,'33','TN','Tamil Nadu'),(34,'34','PY','Pondicherry'),(35,'35','AN','Andaman & Nicobar Islands'),(36,'36','TS','Telangana');
/*!40000 ALTER TABLE `tbl_states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(12) NOT NULL DEFAULT 'OWNER',
  `account_name` varchar(50) NOT NULL,
  `installation_type` enum('RESIDENTIAL','COMMERCIAL') NOT NULL,
  `project_type` enum('NEW CONSTRUCTION','REMODEL','RETROFIT') NOT NULL,
  `date_installed` datetime NOT NULL,
  `subscr_end_date` datetime NOT NULL,
  `dealer_id` int(5) NOT NULL,
  `mac_id` varchar(12) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `setting_password` varchar(50) NOT NULL,
  `confirm_password1` varchar(50) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(30) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `zone_id` int(5) NOT NULL,
  `path_id` int(5) NOT NULL,
  `user_logo` varchar(25) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `reset_token` varchar(150) NOT NULL,
  `created_on` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,'OWNER','Dhiren','COMMERCIAL','NEW CONSTRUCTION','2019-01-02 00:00:00','2019-01-27 03:00:00',1,'123456789','i-tech','Dhiren','Gangal','admin@gmail.com','123456','123456','','','','','','','','',0,0,'','1','','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_zones`
--

DROP TABLE IF EXISTS `tbl_zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_zones` (
  `zone_id` int(10) NOT NULL,
  `country_code` char(2) COLLATE utf8_bin NOT NULL,
  `zone_name` varchar(35) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`zone_id`),
  KEY `idx_zone_name` (`zone_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_zones`
--

LOCK TABLES `tbl_zones` WRITE;
/*!40000 ALTER TABLE `tbl_zones` DISABLE KEYS */;
INSERT INTO `tbl_zones` VALUES (1,'AD','Europe/Andorra'),(2,'AE','Asia/Dubai'),(3,'AF','Asia/Kabul'),(4,'AG','America/Antigua'),(5,'AI','America/Anguilla'),(6,'AL','Europe/Tirane'),(7,'AM','Asia/Yerevan'),(8,'AO','Africa/Luanda'),(9,'AQ','Antarctica/McMurdo'),(10,'AQ','Antarctica/Rothera'),(11,'AQ','Antarctica/Palmer'),(12,'AQ','Antarctica/Mawson'),(13,'AQ','Antarctica/Davis'),(14,'AQ','Antarctica/Casey'),(15,'AQ','Antarctica/Vostok'),(16,'AQ','Antarctica/DumontDUrville'),(17,'AQ','Antarctica/Syowa'),(18,'AQ','Antarctica/Troll'),(19,'AR','America/Argentina/Buenos_Aires'),(20,'AR','America/Argentina/Cordoba'),(21,'AR','America/Argentina/Salta'),(22,'AR','America/Argentina/Jujuy'),(23,'AR','America/Argentina/Tucuman'),(24,'AR','America/Argentina/Catamarca'),(25,'AR','America/Argentina/La_Rioja'),(26,'AR','America/Argentina/San_Juan'),(27,'AR','America/Argentina/Mendoza'),(28,'AR','America/Argentina/San_Luis'),(29,'AR','America/Argentina/Rio_Gallegos'),(30,'AR','America/Argentina/Ushuaia'),(31,'AS','Pacific/Pago_Pago'),(32,'AT','Europe/Vienna'),(33,'AU','Australia/Lord_Howe'),(34,'AU','Antarctica/Macquarie'),(35,'AU','Australia/Hobart'),(36,'AU','Australia/Currie'),(37,'AU','Australia/Melbourne'),(38,'AU','Australia/Sydney'),(39,'AU','Australia/Broken_Hill'),(40,'AU','Australia/Brisbane'),(41,'AU','Australia/Lindeman'),(42,'AU','Australia/Adelaide'),(43,'AU','Australia/Darwin'),(44,'AU','Australia/Perth'),(45,'AU','Australia/Eucla'),(46,'AW','America/Aruba'),(47,'AX','Europe/Mariehamn'),(48,'AZ','Asia/Baku'),(49,'BA','Europe/Sarajevo'),(50,'BB','America/Barbados'),(51,'BD','Asia/Dhaka'),(52,'BE','Europe/Brussels'),(53,'BF','Africa/Ouagadougou'),(54,'BG','Europe/Sofia'),(55,'BH','Asia/Bahrain'),(56,'BI','Africa/Bujumbura'),(57,'BJ','Africa/Porto-Novo'),(58,'BL','America/St_Barthelemy'),(59,'BM','Atlantic/Bermuda'),(60,'BN','Asia/Brunei'),(61,'BO','America/La_Paz'),(62,'BQ','America/Kralendijk'),(63,'BR','America/Noronha'),(64,'BR','America/Belem'),(65,'BR','America/Fortaleza'),(66,'BR','America/Recife'),(67,'BR','America/Araguaina'),(68,'BR','America/Maceio'),(69,'BR','America/Bahia'),(70,'BR','America/Sao_Paulo'),(71,'BR','America/Campo_Grande'),(72,'BR','America/Cuiaba'),(73,'BR','America/Santarem'),(74,'BR','America/Porto_Velho'),(75,'BR','America/Boa_Vista'),(76,'BR','America/Manaus'),(77,'BR','America/Eirunepe'),(78,'BR','America/Rio_Branco'),(79,'BS','America/Nassau'),(80,'BT','Asia/Thimphu'),(81,'BW','Africa/Gaborone'),(82,'BY','Europe/Minsk'),(83,'BZ','America/Belize'),(84,'CA','America/St_Johns'),(85,'CA','America/Halifax'),(86,'CA','America/Glace_Bay'),(87,'CA','America/Moncton'),(88,'CA','America/Goose_Bay'),(89,'CA','America/Blanc-Sablon'),(90,'CA','America/Toronto'),(91,'CA','America/Nipigon'),(92,'CA','America/Thunder_Bay'),(93,'CA','America/Iqaluit'),(94,'CA','America/Pangnirtung'),(95,'CA','America/Resolute'),(96,'CA','America/Atikokan'),(97,'CA','America/Rankin_Inlet'),(98,'CA','America/Winnipeg'),(99,'CA','America/Rainy_River'),(100,'CA','America/Regina'),(101,'CA','America/Swift_Current'),(102,'CA','America/Edmonton'),(103,'CA','America/Cambridge_Bay'),(104,'CA','America/Yellowknife'),(105,'CA','America/Inuvik'),(106,'CA','America/Creston'),(107,'CA','America/Dawson_Creek'),(108,'CA','America/Fort_Nelson'),(109,'CA','America/Vancouver'),(110,'CA','America/Whitehorse'),(111,'CA','America/Dawson'),(112,'CC','Indian/Cocos'),(113,'CD','Africa/Kinshasa'),(114,'CD','Africa/Lubumbashi'),(115,'CF','Africa/Bangui'),(116,'CG','Africa/Brazzaville'),(117,'CH','Europe/Zurich'),(118,'CI','Africa/Abidjan'),(119,'CK','Pacific/Rarotonga'),(120,'CL','America/Santiago'),(121,'CL','Pacific/Easter'),(122,'CM','Africa/Douala'),(123,'CN','Asia/Shanghai'),(124,'CN','Asia/Urumqi'),(125,'CO','America/Bogota'),(126,'CR','America/Costa_Rica'),(127,'CU','America/Havana'),(128,'CV','Atlantic/Cape_Verde'),(129,'CW','America/Curacao'),(130,'CX','Indian/Christmas'),(131,'CY','Asia/Nicosia'),(132,'CZ','Europe/Prague'),(133,'DE','Europe/Berlin'),(134,'DE','Europe/Busingen'),(135,'DJ','Africa/Djibouti'),(136,'DK','Europe/Copenhagen'),(137,'DM','America/Dominica'),(138,'DO','America/Santo_Domingo'),(139,'DZ','Africa/Algiers'),(140,'EC','America/Guayaquil'),(141,'EC','Pacific/Galapagos'),(142,'EE','Europe/Tallinn'),(143,'EG','Africa/Cairo'),(144,'EH','Africa/El_Aaiun'),(145,'ER','Africa/Asmara'),(146,'ES','Europe/Madrid'),(147,'ES','Africa/Ceuta'),(148,'ES','Atlantic/Canary'),(149,'ET','Africa/Addis_Ababa'),(150,'FI','Europe/Helsinki'),(151,'FJ','Pacific/Fiji'),(152,'FK','Atlantic/Stanley'),(153,'FM','Pacific/Chuuk'),(154,'FM','Pacific/Pohnpei'),(155,'FM','Pacific/Kosrae'),(156,'FO','Atlantic/Faroe'),(157,'FR','Europe/Paris'),(158,'GA','Africa/Libreville'),(159,'GB','Europe/London'),(160,'GD','America/Grenada'),(161,'GE','Asia/Tbilisi'),(162,'GF','America/Cayenne'),(163,'GG','Europe/Guernsey'),(164,'GH','Africa/Accra'),(165,'GI','Europe/Gibraltar'),(166,'GL','America/Godthab'),(167,'GL','America/Danmarkshavn'),(168,'GL','America/Scoresbysund'),(169,'GL','America/Thule'),(170,'GM','Africa/Banjul'),(171,'GN','Africa/Conakry'),(172,'GP','America/Guadeloupe'),(173,'GQ','Africa/Malabo'),(174,'GR','Europe/Athens'),(175,'GS','Atlantic/South_Georgia'),(176,'GT','America/Guatemala'),(177,'GU','Pacific/Guam'),(178,'GW','Africa/Bissau'),(179,'GY','America/Guyana'),(180,'HK','Asia/Hong_Kong'),(181,'HN','America/Tegucigalpa'),(182,'HR','Europe/Zagreb'),(183,'HT','America/Port-au-Prince'),(184,'HU','Europe/Budapest'),(185,'ID','Asia/Jakarta'),(186,'ID','Asia/Pontianak'),(187,'ID','Asia/Makassar'),(188,'ID','Asia/Jayapura'),(189,'IE','Europe/Dublin'),(190,'IL','Asia/Jerusalem'),(191,'IM','Europe/Isle_of_Man'),(192,'IN','Asia/Kolkata'),(193,'IO','Indian/Chagos'),(194,'IQ','Asia/Baghdad'),(195,'IR','Asia/Tehran'),(196,'IS','Atlantic/Reykjavik'),(197,'IT','Europe/Rome'),(198,'JE','Europe/Jersey'),(199,'JM','America/Jamaica'),(200,'JO','Asia/Amman'),(201,'JP','Asia/Tokyo'),(202,'KE','Africa/Nairobi'),(203,'KG','Asia/Bishkek'),(204,'KH','Asia/Phnom_Penh'),(205,'KI','Pacific/Tarawa'),(206,'KI','Pacific/Enderbury'),(207,'KI','Pacific/Kiritimati'),(208,'KM','Indian/Comoro'),(209,'KN','America/St_Kitts'),(210,'KP','Asia/Pyongyang'),(211,'KR','Asia/Seoul'),(212,'KW','Asia/Kuwait'),(213,'KY','America/Cayman'),(214,'KZ','Asia/Almaty'),(215,'KZ','Asia/Qyzylorda'),(216,'KZ','Asia/Aqtobe'),(217,'KZ','Asia/Aqtau'),(218,'KZ','Asia/Oral'),(219,'LA','Asia/Vientiane'),(220,'LB','Asia/Beirut'),(221,'LC','America/St_Lucia'),(222,'LI','Europe/Vaduz'),(223,'LK','Asia/Colombo'),(224,'LR','Africa/Monrovia'),(225,'LS','Africa/Maseru'),(226,'LT','Europe/Vilnius'),(227,'LU','Europe/Luxembourg'),(228,'LV','Europe/Riga'),(229,'LY','Africa/Tripoli'),(230,'MA','Africa/Casablanca'),(231,'MC','Europe/Monaco'),(232,'MD','Europe/Chisinau'),(233,'ME','Europe/Podgorica'),(234,'MF','America/Marigot'),(235,'MG','Indian/Antananarivo'),(236,'MH','Pacific/Majuro'),(237,'MH','Pacific/Kwajalein'),(238,'MK','Europe/Skopje'),(239,'ML','Africa/Bamako'),(240,'MM','Asia/Rangoon'),(241,'MN','Asia/Ulaanbaatar'),(242,'MN','Asia/Hovd'),(243,'MN','Asia/Choibalsan'),(244,'MO','Asia/Macau'),(245,'MP','Pacific/Saipan'),(246,'MQ','America/Martinique'),(247,'MR','Africa/Nouakchott'),(248,'MS','America/Montserrat'),(249,'MT','Europe/Malta'),(250,'MU','Indian/Mauritius'),(251,'MV','Indian/Maldives'),(252,'MW','Africa/Blantyre'),(253,'MX','America/Mexico_City'),(254,'MX','America/Cancun'),(255,'MX','America/Merida'),(256,'MX','America/Monterrey'),(257,'MX','America/Matamoros'),(258,'MX','America/Mazatlan'),(259,'MX','America/Chihuahua'),(260,'MX','America/Ojinaga'),(261,'MX','America/Hermosillo'),(262,'MX','America/Tijuana'),(263,'MX','America/Santa_Isabel'),(264,'MX','America/Bahia_Banderas'),(265,'MY','Asia/Kuala_Lumpur'),(266,'MY','Asia/Kuching'),(267,'MZ','Africa/Maputo'),(268,'NA','Africa/Windhoek'),(269,'NC','Pacific/Noumea'),(270,'NE','Africa/Niamey'),(271,'NF','Pacific/Norfolk'),(272,'NG','Africa/Lagos'),(273,'NI','America/Managua'),(274,'NL','Europe/Amsterdam'),(275,'NO','Europe/Oslo'),(276,'NP','Asia/Kathmandu'),(277,'NR','Pacific/Nauru'),(278,'NU','Pacific/Niue'),(279,'NZ','Pacific/Auckland'),(280,'NZ','Pacific/Chatham'),(281,'OM','Asia/Muscat'),(282,'PA','America/Panama'),(283,'PE','America/Lima'),(284,'PF','Pacific/Tahiti'),(285,'PF','Pacific/Marquesas'),(286,'PF','Pacific/Gambier'),(287,'PG','Pacific/Port_Moresby'),(288,'PG','Pacific/Bougainville'),(289,'PH','Asia/Manila'),(290,'PK','Asia/Karachi'),(291,'PL','Europe/Warsaw'),(292,'PM','America/Miquelon'),(293,'PN','Pacific/Pitcairn'),(294,'PR','America/Puerto_Rico'),(295,'PS','Asia/Gaza'),(296,'PS','Asia/Hebron'),(297,'PT','Europe/Lisbon'),(298,'PT','Atlantic/Madeira'),(299,'PT','Atlantic/Azores'),(300,'PW','Pacific/Palau'),(301,'PY','America/Asuncion'),(302,'QA','Asia/Qatar'),(303,'RE','Indian/Reunion'),(304,'RO','Europe/Bucharest'),(305,'RS','Europe/Belgrade'),(306,'RU','Europe/Kaliningrad'),(307,'RU','Europe/Moscow'),(308,'RU','Europe/Simferopol'),(309,'RU','Europe/Volgograd'),(310,'RU','Europe/Samara'),(311,'RU','Asia/Yekaterinburg'),(312,'RU','Asia/Omsk'),(313,'RU','Asia/Novosibirsk'),(314,'RU','Asia/Novokuznetsk'),(315,'RU','Asia/Krasnoyarsk'),(316,'RU','Asia/Irkutsk'),(317,'RU','Asia/Chita'),(318,'RU','Asia/Yakutsk'),(319,'RU','Asia/Khandyga'),(320,'RU','Asia/Vladivostok'),(321,'RU','Asia/Sakhalin'),(322,'RU','Asia/Ust-Nera'),(323,'RU','Asia/Magadan'),(324,'RU','Asia/Srednekolymsk'),(325,'RU','Asia/Kamchatka'),(326,'RU','Asia/Anadyr'),(327,'RW','Africa/Kigali'),(328,'SA','Asia/Riyadh'),(329,'SB','Pacific/Guadalcanal'),(330,'SC','Indian/Mahe'),(331,'SD','Africa/Khartoum'),(332,'SE','Europe/Stockholm'),(333,'SG','Asia/Singapore'),(334,'SH','Atlantic/St_Helena'),(335,'SI','Europe/Ljubljana'),(336,'SJ','Arctic/Longyearbyen'),(337,'SK','Europe/Bratislava'),(338,'SL','Africa/Freetown'),(339,'SM','Europe/San_Marino'),(340,'SN','Africa/Dakar'),(341,'SO','Africa/Mogadishu'),(342,'SR','America/Paramaribo'),(343,'SS','Africa/Juba'),(344,'ST','Africa/Sao_Tome'),(345,'SV','America/El_Salvador'),(346,'SX','America/Lower_Princes'),(347,'SY','Asia/Damascus'),(348,'SZ','Africa/Mbabane'),(349,'TC','America/Grand_Turk'),(350,'TD','Africa/Ndjamena'),(351,'TF','Indian/Kerguelen'),(352,'TG','Africa/Lome'),(353,'TH','Asia/Bangkok'),(354,'TJ','Asia/Dushanbe'),(355,'TK','Pacific/Fakaofo'),(356,'TL','Asia/Dili'),(357,'TM','Asia/Ashgabat'),(358,'TN','Africa/Tunis'),(359,'TO','Pacific/Tongatapu'),(360,'TR','Europe/Istanbul'),(361,'TT','America/Port_of_Spain'),(362,'TV','Pacific/Funafuti'),(363,'TW','Asia/Taipei'),(364,'TZ','Africa/Dar_es_Salaam'),(365,'UA','Europe/Kiev'),(366,'UA','Europe/Uzhgorod'),(367,'UA','Europe/Zaporozhye'),(368,'UG','Africa/Kampala'),(369,'UM','Pacific/Johnston'),(370,'UM','Pacific/Midway'),(371,'UM','Pacific/Wake'),(372,'US','America/New_York'),(373,'US','America/Detroit'),(374,'US','America/Kentucky/Louisville'),(375,'US','America/Kentucky/Monticello'),(376,'US','America/Indiana/Indianapolis'),(377,'US','America/Indiana/Vincennes'),(378,'US','America/Indiana/Winamac'),(379,'US','America/Indiana/Marengo'),(380,'US','America/Indiana/Petersburg'),(381,'US','America/Indiana/Vevay'),(382,'US','America/Chicago'),(383,'US','America/Indiana/Tell_City'),(384,'US','America/Indiana/Knox'),(385,'US','America/Menominee'),(386,'US','America/North_Dakota/Center'),(387,'US','America/North_Dakota/New_Salem'),(388,'US','America/North_Dakota/Beulah'),(389,'US','America/Denver'),(390,'US','America/Boise'),(391,'US','America/Phoenix'),(392,'US','America/Los_Angeles'),(393,'US','America/Metlakatla'),(394,'US','America/Anchorage'),(395,'US','America/Juneau'),(396,'US','America/Sitka'),(397,'US','America/Yakutat'),(398,'US','America/Nome'),(399,'US','America/Adak'),(400,'US','Pacific/Honolulu'),(401,'UY','America/Montevideo'),(402,'UZ','Asia/Samarkand'),(403,'UZ','Asia/Tashkent'),(404,'VA','Europe/Vatican'),(405,'VC','America/St_Vincent'),(406,'VE','America/Caracas'),(407,'VG','America/Tortola'),(408,'VI','America/St_Thomas'),(409,'VN','Asia/Ho_Chi_Minh'),(410,'VU','Pacific/Efate'),(411,'WF','Pacific/Wallis'),(412,'WS','Pacific/Apia'),(413,'YE','Asia/Aden'),(414,'YT','Indian/Mayotte'),(415,'ZA','Africa/Johannesburg'),(416,'ZM','Africa/Lusaka'),(417,'ZW','Africa/Harare');
/*!40000 ALTER TABLE `tbl_zones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-21 13:21:55
