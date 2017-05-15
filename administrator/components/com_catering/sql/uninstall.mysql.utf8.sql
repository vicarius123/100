DROP TABLE IF EXISTS `#__catering_items`;
DROP TABLE IF EXISTS `#__catering_service`;
DROP TABLE IF EXISTS `#__catering_cuisine`;
DROP TABLE IF EXISTS `#__catering_category`;
DROP TABLE IF EXISTS `#__catering_reserve`;
DROP TABLE IF EXISTS `#__catering_services`;

DELETE FROM `#__content_types` WHERE (type_alias LIKE 'com_catering.%');