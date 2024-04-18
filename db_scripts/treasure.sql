/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : treasure

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-04-18 12:34:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `business_officer`
-- ----------------------------
DROP TABLE IF EXISTS `business_officer`;
CREATE TABLE `business_officer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'bo',
  `name` varchar(255) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT '',
  `last_name` varchar(100) DEFAULT '',
  `is_aof` tinyint(1) DEFAULT 0,
  `role` varchar(50) DEFAULT '',
  `phone_number` varchar(50) DEFAULT '',
  `email` varchar(100) DEFAULT '',
  `citizenship_country` varchar(10) DEFAULT '',
  `dob` varchar(25) DEFAULT '',
  `scn` varchar(25) DEFAULT '',
  `residency_country` varchar(10) DEFAULT '',
  `address1` varchar(255) DEFAULT '',
  `address2` varchar(255) DEFAULT '',
  `city` varchar(100) DEFAULT '',
  `state` varchar(10) DEFAULT '',
  `zip` varchar(50) DEFAULT '',
  `ownership_percent` varchar(50) DEFAULT '0',
  `business_officer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of business_officer
-- ----------------------------

-- ----------------------------
-- Table structure for `business_type`
-- ----------------------------
DROP TABLE IF EXISTS `business_type`;
CREATE TABLE `business_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `status` varchar(1) DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of business_type
-- ----------------------------
INSERT INTO `business_type` VALUES ('1', 'LLC', 'llc', 'Y');
INSERT INTO `business_type` VALUES ('2', 'Partnership', 'partnership', 'Y');
INSERT INTO `business_type` VALUES ('3', 'Private Corporation (C Corp)', 'c_corporation', 'Y');
INSERT INTO `business_type` VALUES ('4', 'S Corporation', 's_corporation', 'Y');

-- ----------------------------
-- Table structure for `countries`
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `status` char(1) DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=244 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('1', 'AF', 'AFGHANISTAN', 'AFG', 'Y');
INSERT INTO `countries` VALUES ('2', 'AL', 'ALBANIA', 'ALB', 'Y');
INSERT INTO `countries` VALUES ('3', 'DZ', 'ALGERIA', 'DZA', 'Y');
INSERT INTO `countries` VALUES ('4', 'AS', 'AMERICAN SAMOA', 'ASM', 'Y');
INSERT INTO `countries` VALUES ('5', 'AD', 'ANDORRA', 'AND', 'Y');
INSERT INTO `countries` VALUES ('6', 'AO', 'ANGOLA', 'AGO', 'Y');
INSERT INTO `countries` VALUES ('7', 'AI', 'ANGUILLA', 'AIA', 'Y');
INSERT INTO `countries` VALUES ('9', 'AG', 'ANTIGUA AND BARBUDA', 'ATG', 'Y');
INSERT INTO `countries` VALUES ('10', 'AR', 'ARGENTINA', 'ARG', 'Y');
INSERT INTO `countries` VALUES ('11', 'AM', 'ARMENIA', 'ARM', 'Y');
INSERT INTO `countries` VALUES ('12', 'AW', 'ARUBA', 'ABW', 'Y');
INSERT INTO `countries` VALUES ('13', 'AU', 'AUSTRALIA', 'AUS', 'Y');
INSERT INTO `countries` VALUES ('14', 'AT', 'AUSTRIA', 'AUT', 'Y');
INSERT INTO `countries` VALUES ('15', 'AZ', 'AZERBAIJAN', 'AZE', 'Y');
INSERT INTO `countries` VALUES ('16', 'BS', 'BAHAMAS', 'BHS', 'Y');
INSERT INTO `countries` VALUES ('17', 'BH', 'BAHRAIN', 'BHR', 'Y');
INSERT INTO `countries` VALUES ('18', 'BD', 'BANGLADESH', 'BGD', 'Y');
INSERT INTO `countries` VALUES ('19', 'BB', 'BARBADOS', 'BRB', 'Y');
INSERT INTO `countries` VALUES ('20', 'BY', 'BELARUS', 'BLR', 'Y');
INSERT INTO `countries` VALUES ('21', 'BE', 'BELGIUM', 'BEL', 'Y');
INSERT INTO `countries` VALUES ('22', 'BZ', 'BELIZE', 'BLZ', 'Y');
INSERT INTO `countries` VALUES ('23', 'BJ', 'BENIN', 'BEN', 'Y');
INSERT INTO `countries` VALUES ('24', 'BM', 'BERMUDA', 'BMU', 'Y');
INSERT INTO `countries` VALUES ('25', 'BT', 'BHUTAN', 'BTN', 'Y');
INSERT INTO `countries` VALUES ('26', 'BO', 'BOLIVIA', 'BOL', 'Y');
INSERT INTO `countries` VALUES ('27', 'BA', 'BOSNIA AND HERZEGOVINA', 'BIH', 'Y');
INSERT INTO `countries` VALUES ('28', 'BW', 'BOTSWANA', 'BWA', 'Y');
INSERT INTO `countries` VALUES ('30', 'BR', 'BRAZIL', 'BRA', 'Y');
INSERT INTO `countries` VALUES ('32', 'BN', 'BRUNEI DARUSSALAM', 'BRN', 'Y');
INSERT INTO `countries` VALUES ('33', 'BG', 'BULGARIA', 'BGR', 'Y');
INSERT INTO `countries` VALUES ('34', 'BF', 'BURKINA FASO', 'BFA', 'Y');
INSERT INTO `countries` VALUES ('35', 'BI', 'BURUNDI', 'BDI', 'Y');
INSERT INTO `countries` VALUES ('36', 'KH', 'CAMBODIA', 'KHM', 'Y');
INSERT INTO `countries` VALUES ('37', 'CM', 'CAMEROON', 'CMR', 'Y');
INSERT INTO `countries` VALUES ('38', 'CA', 'CANADA', 'CAN', 'Y');
INSERT INTO `countries` VALUES ('39', 'CV', 'CAPE VERDE', 'CPV', 'Y');
INSERT INTO `countries` VALUES ('40', 'KY', 'CAYMAN ISLANDS', 'CYM', 'Y');
INSERT INTO `countries` VALUES ('41', 'CF', 'CENTRAL AFRICAN REPUBLIC', 'CAF', 'Y');
INSERT INTO `countries` VALUES ('42', 'TD', 'CHAD', 'TCD', 'Y');
INSERT INTO `countries` VALUES ('43', 'CL', 'CHILE', 'CHL', 'Y');
INSERT INTO `countries` VALUES ('44', 'CN', 'CHINA', 'CHN', 'Y');
INSERT INTO `countries` VALUES ('47', 'CO', 'COLOMBIA', 'COL', 'Y');
INSERT INTO `countries` VALUES ('48', 'KM', 'COMOROS', 'COM', 'Y');
INSERT INTO `countries` VALUES ('49', 'CG', 'CONGO', 'COG', 'Y');
INSERT INTO `countries` VALUES ('50', 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'COD', 'Y');
INSERT INTO `countries` VALUES ('51', 'CK', 'COOK ISLANDS', 'COK', 'Y');
INSERT INTO `countries` VALUES ('52', 'CR', 'COSTA RICA', 'CRI', 'Y');
INSERT INTO `countries` VALUES ('53', 'CI', 'COTE D\'IVOIRE', 'CIV', 'Y');
INSERT INTO `countries` VALUES ('54', 'HR', 'CROATIA', 'HRV', 'Y');
INSERT INTO `countries` VALUES ('55', 'CU', 'CUBA', 'CUB', 'Y');
INSERT INTO `countries` VALUES ('56', 'CY', 'CYPRUS', 'CYP', 'Y');
INSERT INTO `countries` VALUES ('57', 'CZ', 'CZECH REPUBLIC', 'CZE', 'Y');
INSERT INTO `countries` VALUES ('58', 'DK', 'DENMARK', 'DNK', 'Y');
INSERT INTO `countries` VALUES ('59', 'DJ', 'DJIBOUTI', 'DJI', 'Y');
INSERT INTO `countries` VALUES ('60', 'DM', 'DOMINICA', 'DMA', 'Y');
INSERT INTO `countries` VALUES ('61', 'DO', 'DOMINICAN REPUBLIC', 'DOM', 'Y');
INSERT INTO `countries` VALUES ('62', 'EC', 'ECUADOR', 'ECU', 'Y');
INSERT INTO `countries` VALUES ('63', 'EG', 'EGYPT', 'EGY', 'Y');
INSERT INTO `countries` VALUES ('64', 'SV', 'EL SALVADOR', 'SLV', 'Y');
INSERT INTO `countries` VALUES ('65', 'GQ', 'EQUATORIAL GUINEA', 'GNQ', 'Y');
INSERT INTO `countries` VALUES ('66', 'ER', 'ERITREA', 'ERI', 'Y');
INSERT INTO `countries` VALUES ('67', 'EE', 'ESTONIA', 'EST', 'Y');
INSERT INTO `countries` VALUES ('68', 'ET', 'ETHIOPIA', 'ETH', 'Y');
INSERT INTO `countries` VALUES ('69', 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'FLK', 'Y');
INSERT INTO `countries` VALUES ('70', 'FO', 'FAROE ISLANDS', 'FRO', 'Y');
INSERT INTO `countries` VALUES ('71', 'FJ', 'FIJI', 'FJI', 'Y');
INSERT INTO `countries` VALUES ('72', 'FI', 'FINLAND', 'FIN', 'Y');
INSERT INTO `countries` VALUES ('73', 'FR', 'FRANCE', 'FRA', 'Y');
INSERT INTO `countries` VALUES ('74', 'GF', 'FRENCH GUIANA', 'GUF', 'Y');
INSERT INTO `countries` VALUES ('75', 'PF', 'FRENCH POLYNESIA', 'PYF', 'Y');
INSERT INTO `countries` VALUES ('77', 'GA', 'GABON', 'GAB', 'Y');
INSERT INTO `countries` VALUES ('78', 'GM', 'GAMBIA', 'GMB', 'Y');
INSERT INTO `countries` VALUES ('79', 'GE', 'GEORGIA', 'GEO', 'Y');
INSERT INTO `countries` VALUES ('80', 'DE', 'GERMANY', 'DEU', 'Y');
INSERT INTO `countries` VALUES ('81', 'GH', 'GHANA', 'GHA', 'Y');
INSERT INTO `countries` VALUES ('82', 'GI', 'GIBRALTAR', 'GIB', 'Y');
INSERT INTO `countries` VALUES ('83', 'GR', 'GREECE', 'GRC', 'Y');
INSERT INTO `countries` VALUES ('84', 'GL', 'GREENLAND', 'GRL', 'Y');
INSERT INTO `countries` VALUES ('85', 'GD', 'GRENADA', 'GRD', 'Y');
INSERT INTO `countries` VALUES ('86', 'GP', 'GUADELOUPE', 'GLP', 'Y');
INSERT INTO `countries` VALUES ('87', 'GU', 'GUAM', 'GUM', 'Y');
INSERT INTO `countries` VALUES ('88', 'GT', 'GUATEMALA', 'GTM', 'Y');
INSERT INTO `countries` VALUES ('89', 'GN', 'GUINEA', 'GIN', 'Y');
INSERT INTO `countries` VALUES ('90', 'GW', 'GUINEA-BISSAU', 'GNB', 'Y');
INSERT INTO `countries` VALUES ('91', 'GY', 'GUYANA', 'GUY', 'Y');
INSERT INTO `countries` VALUES ('92', 'HT', 'HAITI', 'HTI', 'Y');
INSERT INTO `countries` VALUES ('94', 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'VAT', 'Y');
INSERT INTO `countries` VALUES ('95', 'HN', 'HONDURAS', 'HND', 'Y');
INSERT INTO `countries` VALUES ('96', 'HK', 'HONG KONG', 'HKG', 'Y');
INSERT INTO `countries` VALUES ('97', 'HU', 'HUNGARY', 'HUN', 'Y');
INSERT INTO `countries` VALUES ('98', 'IS', 'ICELAND', 'ISL', 'Y');
INSERT INTO `countries` VALUES ('99', 'IN', 'INDIA', 'IND', 'Y');
INSERT INTO `countries` VALUES ('100', 'ID', 'INDONESIA', 'IDN', 'Y');
INSERT INTO `countries` VALUES ('101', 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'IRN', 'Y');
INSERT INTO `countries` VALUES ('102', 'IQ', 'IRAQ', 'IRQ', 'Y');
INSERT INTO `countries` VALUES ('103', 'IE', 'IRELAND', 'IRL', 'Y');
INSERT INTO `countries` VALUES ('104', 'IL', 'ISRAEL', 'ISR', 'Y');
INSERT INTO `countries` VALUES ('105', 'IT', 'ITALY', 'ITA', 'Y');
INSERT INTO `countries` VALUES ('106', 'JM', 'JAMAICA', 'JAM', 'Y');
INSERT INTO `countries` VALUES ('107', 'JP', 'JAPAN', 'JPN', 'Y');
INSERT INTO `countries` VALUES ('108', 'JO', 'JORDAN', 'JOR', 'Y');
INSERT INTO `countries` VALUES ('109', 'KZ', 'KAZAKHSTAN', 'KAZ', 'Y');
INSERT INTO `countries` VALUES ('110', 'KE', 'KENYA', 'KEN', 'Y');
INSERT INTO `countries` VALUES ('111', 'KI', 'KIRIBATI', 'KIR', 'Y');
INSERT INTO `countries` VALUES ('112', 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'PRK', 'Y');
INSERT INTO `countries` VALUES ('113', 'KR', 'KOREA, REPUBLIC OF', 'KOR', 'Y');
INSERT INTO `countries` VALUES ('114', 'KW', 'KUWAIT', 'KWT', 'Y');
INSERT INTO `countries` VALUES ('115', 'KG', 'KYRGYZSTAN', 'KGZ', 'Y');
INSERT INTO `countries` VALUES ('116', 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'LAO', 'Y');
INSERT INTO `countries` VALUES ('117', 'LV', 'LATVIA', 'LVA', 'Y');
INSERT INTO `countries` VALUES ('118', 'LB', 'LEBANON', 'LBN', 'Y');
INSERT INTO `countries` VALUES ('119', 'LS', 'LESOTHO', 'LSO', 'Y');
INSERT INTO `countries` VALUES ('120', 'LR', 'LIBERIA', 'LBR', 'Y');
INSERT INTO `countries` VALUES ('121', 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'LBY', 'Y');
INSERT INTO `countries` VALUES ('122', 'LI', 'LIECHTENSTEIN', 'LIE', 'Y');
INSERT INTO `countries` VALUES ('123', 'LT', 'LITHUANIA', 'LTU', 'Y');
INSERT INTO `countries` VALUES ('124', 'LU', 'LUXEMBOURG', 'LUX', 'Y');
INSERT INTO `countries` VALUES ('125', 'MO', 'MACAO', 'MAC', 'Y');
INSERT INTO `countries` VALUES ('126', 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'MKD', 'Y');
INSERT INTO `countries` VALUES ('127', 'MG', 'MADAGASCAR', 'MDG', 'Y');
INSERT INTO `countries` VALUES ('128', 'MW', 'MALAWI', 'MWI', 'Y');
INSERT INTO `countries` VALUES ('129', 'MY', 'MALAYSIA', 'MYS', 'Y');
INSERT INTO `countries` VALUES ('130', 'MV', 'MALDIVES', 'MDV', 'Y');
INSERT INTO `countries` VALUES ('131', 'ML', 'MALI', 'MLI', 'Y');
INSERT INTO `countries` VALUES ('132', 'MT', 'MALTA', 'MLT', 'Y');
INSERT INTO `countries` VALUES ('133', 'MH', 'MARSHALL ISLANDS', 'MHL', 'Y');
INSERT INTO `countries` VALUES ('134', 'MQ', 'MARTINIQUE', 'MTQ', 'Y');
INSERT INTO `countries` VALUES ('135', 'MR', 'MAURITANIA', 'MRT', 'Y');
INSERT INTO `countries` VALUES ('136', 'MU', 'MAURITIUS', 'MUS', 'Y');
INSERT INTO `countries` VALUES ('138', 'MX', 'MEXICO', 'MEX', 'Y');
INSERT INTO `countries` VALUES ('139', 'FM', 'MICRONESIA, FEDERATED STATES OF', 'FSM', 'Y');
INSERT INTO `countries` VALUES ('140', 'MD', 'MOLDOVA, REPUBLIC OF', 'MDA', 'Y');
INSERT INTO `countries` VALUES ('141', 'MC', 'MONACO', 'MCO', 'Y');
INSERT INTO `countries` VALUES ('142', 'MN', 'MONGOLIA', 'MNG', 'Y');
INSERT INTO `countries` VALUES ('143', 'MS', 'MONTSERRAT', 'MSR', 'Y');
INSERT INTO `countries` VALUES ('144', 'MA', 'MOROCCO', 'MAR', 'Y');
INSERT INTO `countries` VALUES ('145', 'MZ', 'MOZAMBIQUE', 'MOZ', 'Y');
INSERT INTO `countries` VALUES ('146', 'MM', 'MYANMAR', 'MMR', 'Y');
INSERT INTO `countries` VALUES ('147', 'NA', 'NAMIBIA', 'NAM', 'Y');
INSERT INTO `countries` VALUES ('148', 'NR', 'NAURU', 'NRU', 'Y');
INSERT INTO `countries` VALUES ('149', 'NP', 'NEPAL', 'NPL', 'Y');
INSERT INTO `countries` VALUES ('150', 'NL', 'NETHERLANDS', 'NLD', 'Y');
INSERT INTO `countries` VALUES ('151', 'AN', 'NETHERLANDS ANTILLES', 'ANT', 'Y');
INSERT INTO `countries` VALUES ('152', 'NC', 'NEW CALEDONIA', 'NCL', 'Y');
INSERT INTO `countries` VALUES ('153', 'NZ', 'NEW ZEALAND', 'NZL', 'Y');
INSERT INTO `countries` VALUES ('154', 'NI', 'NICARAGUA', 'NIC', 'Y');
INSERT INTO `countries` VALUES ('155', 'NE', 'NIGER', 'NER', 'Y');
INSERT INTO `countries` VALUES ('156', 'NG', 'NIGERIA', 'NGA', 'Y');
INSERT INTO `countries` VALUES ('157', 'NU', 'NIUE', 'NIU', 'Y');
INSERT INTO `countries` VALUES ('158', 'NF', 'NORFOLK ISLAND', 'NFK', 'Y');
INSERT INTO `countries` VALUES ('159', 'MP', 'NORTHERN MARIANA ISLANDS', 'MNP', 'Y');
INSERT INTO `countries` VALUES ('160', 'NO', 'NORWAY', 'NOR', 'Y');
INSERT INTO `countries` VALUES ('161', 'OM', 'OMAN', 'OMN', 'Y');
INSERT INTO `countries` VALUES ('162', 'PK', 'PAKISTAN', 'PAK', 'Y');
INSERT INTO `countries` VALUES ('163', 'PW', 'PALAU', 'PLW', 'Y');
INSERT INTO `countries` VALUES ('165', 'PA', 'PANAMA', 'PAN', 'Y');
INSERT INTO `countries` VALUES ('166', 'PG', 'PAPUA NEW GUINEA', 'PNG', 'Y');
INSERT INTO `countries` VALUES ('167', 'PY', 'PARAGUAY', 'PRY', 'Y');
INSERT INTO `countries` VALUES ('168', 'PE', 'PERU', 'PER', 'Y');
INSERT INTO `countries` VALUES ('169', 'PH', 'PHILIPPINES', 'PHL', 'Y');
INSERT INTO `countries` VALUES ('170', 'PN', 'PITCAIRN', 'PCN', 'Y');
INSERT INTO `countries` VALUES ('171', 'PL', 'POLAND', 'POL', 'Y');
INSERT INTO `countries` VALUES ('172', 'PT', 'PORTUGAL', 'PRT', 'Y');
INSERT INTO `countries` VALUES ('173', 'PR', 'PUERTO RICO', 'PRI', 'Y');
INSERT INTO `countries` VALUES ('174', 'QA', 'QATAR', 'QAT', 'Y');
INSERT INTO `countries` VALUES ('175', 'RE', 'REUNION', 'REU', 'Y');
INSERT INTO `countries` VALUES ('176', 'RO', 'ROMANIA', 'ROM', 'Y');
INSERT INTO `countries` VALUES ('177', 'RU', 'RUSSIAN FEDERATION', 'RUS', 'Y');
INSERT INTO `countries` VALUES ('178', 'RW', 'RWANDA', 'RWA', 'Y');
INSERT INTO `countries` VALUES ('179', 'SH', 'SAINT HELENA', 'SHN', 'Y');
INSERT INTO `countries` VALUES ('180', 'KN', 'SAINT KITTS AND NEVIS', 'KNA', 'Y');
INSERT INTO `countries` VALUES ('181', 'LC', 'SAINT LUCIA', 'LCA', 'Y');
INSERT INTO `countries` VALUES ('182', 'PM', 'SAINT PIERRE AND MIQUELON', 'SPM', 'Y');
INSERT INTO `countries` VALUES ('183', 'VC', 'SAINT VINCENT AND THE GRENADINES', 'VCT', 'Y');
INSERT INTO `countries` VALUES ('184', 'WS', 'SAMOA', 'WSM', 'Y');
INSERT INTO `countries` VALUES ('185', 'SM', 'SAN MARINO', 'SMR', 'Y');
INSERT INTO `countries` VALUES ('186', 'ST', 'SAO TOME AND PRINCIPE', 'STP', 'Y');
INSERT INTO `countries` VALUES ('187', 'SA', 'SAUDI ARABIA', 'SAU', 'Y');
INSERT INTO `countries` VALUES ('188', 'SN', 'SENEGAL', 'SEN', 'Y');
INSERT INTO `countries` VALUES ('190', 'SC', 'SEYCHELLES', 'SYC', 'Y');
INSERT INTO `countries` VALUES ('191', 'SL', 'SIERRA LEONE', 'SLE', 'Y');
INSERT INTO `countries` VALUES ('192', 'SG', 'SINGAPORE', 'SGP', 'Y');
INSERT INTO `countries` VALUES ('193', 'SK', 'SLOVAKIA', 'SVK', 'Y');
INSERT INTO `countries` VALUES ('194', 'SI', 'SLOVENIA', 'SVN', 'Y');
INSERT INTO `countries` VALUES ('195', 'SB', 'SOLOMON ISLANDS', 'SLB', 'Y');
INSERT INTO `countries` VALUES ('196', 'SO', 'SOMALIA', 'SOM', 'Y');
INSERT INTO `countries` VALUES ('197', 'ZA', 'SOUTH AFRICA', 'ZAF', 'Y');
INSERT INTO `countries` VALUES ('199', 'ES', 'SPAIN', 'ESP', 'Y');
INSERT INTO `countries` VALUES ('200', 'LK', 'SRI LANKA', 'LKA', 'Y');
INSERT INTO `countries` VALUES ('201', 'SD', 'SUDAN', 'SDN', 'Y');
INSERT INTO `countries` VALUES ('202', 'SR', 'SURINAME', 'SUR', 'Y');
INSERT INTO `countries` VALUES ('203', 'SJ', 'SVALBARD AND JAN MAYEN', 'SJM', 'Y');
INSERT INTO `countries` VALUES ('204', 'SZ', 'SWAZILAND', 'SWZ', 'Y');
INSERT INTO `countries` VALUES ('205', 'SE', 'SWEDEN', 'SWE', 'Y');
INSERT INTO `countries` VALUES ('206', 'CH', 'SWITZERLAND', 'CHE', 'Y');
INSERT INTO `countries` VALUES ('207', 'SY', 'SYRIAN ARAB REPUBLIC', 'SYR', 'Y');
INSERT INTO `countries` VALUES ('208', 'TW', 'TAIWAN, PROVINCE OF CHINA', 'TWN', 'Y');
INSERT INTO `countries` VALUES ('209', 'TJ', 'TAJIKISTAN', 'TJK', 'Y');
INSERT INTO `countries` VALUES ('210', 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'TZA', 'Y');
INSERT INTO `countries` VALUES ('211', 'TH', 'THAILAND', 'THA', 'Y');
INSERT INTO `countries` VALUES ('213', 'TG', 'TOGO', 'TGO', 'Y');
INSERT INTO `countries` VALUES ('214', 'TK', 'TOKELAU', 'TKL', 'Y');
INSERT INTO `countries` VALUES ('215', 'TO', 'TONGA', 'TON', 'Y');
INSERT INTO `countries` VALUES ('216', 'TT', 'TRINIDAD AND TOBAGO', 'TTO', 'Y');
INSERT INTO `countries` VALUES ('217', 'TN', 'TUNISIA', 'TUN', 'Y');
INSERT INTO `countries` VALUES ('218', 'TR', 'TURKEY', 'TUR', 'Y');
INSERT INTO `countries` VALUES ('219', 'TM', 'TURKMENISTAN', 'TKM', 'Y');
INSERT INTO `countries` VALUES ('220', 'TC', 'TURKS AND CAICOS ISLANDS', 'TCA', 'Y');
INSERT INTO `countries` VALUES ('221', 'TV', 'TUVALU', 'TUV', 'Y');
INSERT INTO `countries` VALUES ('222', 'UG', 'UGANDA', 'UGA', 'Y');
INSERT INTO `countries` VALUES ('223', 'UA', 'UKRAINE', 'UKR', 'Y');
INSERT INTO `countries` VALUES ('224', 'AE', 'UNITED ARAB EMIRATES', 'ARE', 'Y');
INSERT INTO `countries` VALUES ('225', 'GB', 'UNITED KINGDOM', 'GBR', 'Y');
INSERT INTO `countries` VALUES ('226', 'US', 'UNITED STATES', 'USA', 'Y');
INSERT INTO `countries` VALUES ('228', 'UY', 'URUGUAY', 'URY', 'Y');
INSERT INTO `countries` VALUES ('229', 'UZ', 'UZBEKISTAN', 'UZB', 'Y');
INSERT INTO `countries` VALUES ('230', 'VU', 'VANUATU', 'VUT', 'Y');
INSERT INTO `countries` VALUES ('231', 'VE', 'VENEZUELA', 'VEN', 'Y');
INSERT INTO `countries` VALUES ('232', 'VN', 'VIET NAM', 'VNM', 'Y');
INSERT INTO `countries` VALUES ('233', 'VG', 'VIRGIN ISLANDS, BRITISH', 'VGB', 'Y');
INSERT INTO `countries` VALUES ('234', 'VI', 'VIRGIN ISLANDS, U.S.', 'VIR', 'Y');
INSERT INTO `countries` VALUES ('235', 'WF', 'WALLIS AND FUTUNA', 'WLF', 'Y');
INSERT INTO `countries` VALUES ('236', 'EH', 'WESTERN SAHARA', 'ESH', 'Y');
INSERT INTO `countries` VALUES ('237', 'YE', 'YEMEN', 'YEM', 'Y');
INSERT INTO `countries` VALUES ('238', 'ZM', 'ZAMBIA', 'ZMB', 'Y');
INSERT INTO `countries` VALUES ('239', 'ZW', 'ZIMBABWE', 'ZWE', 'Y');

-- ----------------------------
-- Table structure for `states`
-- ----------------------------
DROP TABLE IF EXISTS `states`;
CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(2) DEFAULT NULL,
  `status` varchar(1) DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of states
-- ----------------------------
INSERT INTO `states` VALUES ('1', '226', 'Alabama', 'AL', 'Y');
INSERT INTO `states` VALUES ('2', '226', 'Alaska', 'AK', 'Y');
INSERT INTO `states` VALUES ('3', '226', 'Arizona', 'AZ', 'Y');
INSERT INTO `states` VALUES ('4', '226', 'Arkansas', 'AR', 'Y');
INSERT INTO `states` VALUES ('5', '226', 'California', 'CA', 'Y');
INSERT INTO `states` VALUES ('6', '226', 'Colorado', 'CO', 'Y');
INSERT INTO `states` VALUES ('7', '226', 'Connecticut', 'CT', 'Y');
INSERT INTO `states` VALUES ('8', '226', 'Delaware', 'DE', 'Y');
INSERT INTO `states` VALUES ('9', '226', 'District Of Columbia', 'DC', 'Y');
INSERT INTO `states` VALUES ('10', '226', 'Florida', 'FL', 'Y');
INSERT INTO `states` VALUES ('11', '226', 'Georgia', 'GA', 'Y');
INSERT INTO `states` VALUES ('12', '226', 'Hawaii', 'HI', 'Y');
INSERT INTO `states` VALUES ('13', '226', 'Idaho', 'ID', 'Y');
INSERT INTO `states` VALUES ('14', '226', 'Illinois', 'IL', 'Y');
INSERT INTO `states` VALUES ('15', '226', 'Indiana', 'IN', 'Y');
INSERT INTO `states` VALUES ('16', '226', 'Iowa', 'IA', 'Y');
INSERT INTO `states` VALUES ('17', '226', 'Kansas', 'KS', 'Y');
INSERT INTO `states` VALUES ('18', '226', 'Kentucky', 'KY', 'Y');
INSERT INTO `states` VALUES ('19', '226', 'Louisiana', 'LA', 'Y');
INSERT INTO `states` VALUES ('20', '226', 'Maine', 'ME', 'Y');
INSERT INTO `states` VALUES ('21', '226', 'Maryland', 'MD', 'Y');
INSERT INTO `states` VALUES ('22', '226', 'Massachusetts', 'MA', 'Y');
INSERT INTO `states` VALUES ('23', '226', 'Michigan', 'MI', 'Y');
INSERT INTO `states` VALUES ('24', '226', 'Minnesota', 'MN', 'Y');
INSERT INTO `states` VALUES ('25', '226', 'Mississippi', 'MS', 'Y');
INSERT INTO `states` VALUES ('26', '226', 'Missouri', 'MO', 'Y');
INSERT INTO `states` VALUES ('27', '226', 'Montana', 'MT', 'Y');
INSERT INTO `states` VALUES ('28', '226', 'Nebraska', 'NE', 'Y');
INSERT INTO `states` VALUES ('29', '226', 'Nevada', 'NV', 'Y');
INSERT INTO `states` VALUES ('30', '226', 'New Hampshire', 'NH', 'Y');
INSERT INTO `states` VALUES ('31', '226', 'New Jersey', 'NJ', 'Y');
INSERT INTO `states` VALUES ('32', '226', 'New Mexico', 'NM', 'Y');
INSERT INTO `states` VALUES ('33', '226', 'New York', 'NY', 'Y');
INSERT INTO `states` VALUES ('34', '226', 'North Carolina', 'NC', 'Y');
INSERT INTO `states` VALUES ('35', '226', 'North Dakota', 'ND', 'Y');
INSERT INTO `states` VALUES ('36', '226', 'Ohio', 'OH', 'Y');
INSERT INTO `states` VALUES ('37', '226', 'Oklahoma', 'OK', 'Y');
INSERT INTO `states` VALUES ('38', '226', 'Oregon', 'OR', 'Y');
INSERT INTO `states` VALUES ('39', '226', 'Pennsylvania', 'PA', 'Y');
INSERT INTO `states` VALUES ('40', '226', 'Rhode Island', 'RI', 'Y');
INSERT INTO `states` VALUES ('41', '226', 'South Carolina', 'SC', 'Y');
INSERT INTO `states` VALUES ('42', '226', 'South Dakota', 'SD', 'Y');
INSERT INTO `states` VALUES ('43', '226', 'Tennessee', 'TN', 'Y');
INSERT INTO `states` VALUES ('44', '226', 'Texas', 'TX', 'Y');
INSERT INTO `states` VALUES ('45', '226', 'Utah', 'UT', 'Y');
INSERT INTO `states` VALUES ('46', '226', 'Vermont', 'VT', 'Y');
INSERT INTO `states` VALUES ('47', '226', 'Virginia', 'VA', 'Y');
INSERT INTO `states` VALUES ('48', '226', 'Washington', 'WA', 'Y');
INSERT INTO `states` VALUES ('49', '226', 'West Virginia', 'WV', 'Y');
INSERT INTO `states` VALUES ('50', '226', 'Wisconsin', 'WI', 'Y');
INSERT INTO `states` VALUES ('51', '226', 'Wyoming', 'WY', 'Y');
