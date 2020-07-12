DROP DATABASE IF EXISTS `datetimediff`;
CREATE DATABASE `datetimediff`;

USE `datetimediff`;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
);
  
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);
 
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 2);
  
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
);
 
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` bigint(20) NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
);
  
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
);
 
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'Hwo2kRjEOaKaQnsNuZLDjJ69O4AE6qMnToFV67xY', NULL, 'http://localhost', 1, 0, 0, '2020-07-11 02:03:09', '2020-07-11 02:03:09'),
(2, NULL, 'Laravel Password Grant Client', 'bkyXdqAcHC0U5UgiqNkg7Iq0pFoFQM7Vln8I2avI', 'users', 'http://localhost', 0, 1, 0, '2020-07-11 02:03:09', '2020-07-11 02:03:09');
 
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
  
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-07-11 02:03:09', '2020-07-11 02:03:09');
  
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
);
  
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
);
  
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `api_token` text NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
 
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Louis', 'fk827728@gmail.com', NULL, '', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjM0MGRmMGIyNGE2ZTU0ZmRkYmFlOTk4MTJkOGQ3YjMyNzkyOGNiOGRjNTM0ZWJkNTZiNWE2Yjg5Nzk2ZTMyMThmYjQ4OGM2YTIyY2ZiM2NhIn0.eyJhdWQiOiIxIiwianRpIjoiMzQwZGYwYjI0YTZlNTRmZGRiYWU5OTgxMmQ4ZDdiMzI3OTI4Y2I4ZGM1MzRlYmQ1NmI1YTZiODk3OTZlMzIxOGZiNDg4YzZhMjJjZmIzY2EiLCJpYXQiOjE1OTQzOTcyMDQsIm5iZiI6MTU5NDM5NzIwNCwiZXhwIjoxNjI1OTMzMjA0LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.YHPJwxtP9t2y8Vlqsk4khsv6X2w9ut1c6llGITwoLByo6uT3rpoCxCH_cJTPPbMcpQkwVJvykUnApOITYWYSV2HwkYaEp-YyMYKhNcl0MiGd0lh9hvwgBJX9VASq8Gc4XNr-mZTZC9_Zkt32V_979xgWsObdswCkb7kx-soh4twPSDPDLRKgJrCOvhgciH25cvTo5l44Aye8puRrKzHMbpyhHNWAeeHFPI5W3Zi2WpSIfLC3O_5WZkp3RhKTECYgHWiamPOIZlyIY68KjeRqsW9eVdFKiKFb29YWt8uw8mflgyuis0Tv3FpA_KO-dKi0L0HhX9UtpZjZd0NGw_IfH7Ei-fpGubOQwEybcEly6l8gAFkvLFfNjIpMOjnnVJTX2R5oliuXzL9IezOL6KUlxwLCmoI_0P1FXBf09QkpM6Yh6Yp8-sLEX2FdzS_qZepoBZCGr3VLmGSNye223rSOX2CDwB_cRzSD-PvRcigQ5wXg1xO51vqf6XOwtwoIVht3z-_sekla5uJs3xb8t6C0sjEsiBlrnIKV2Cn7QKXdSoucBcSOa26x5PzcSqDlgu2J8KGh-KgAskMDMKQhAfQ4blvyP10rcva7KXn9Zb_eNEd9gtUr0G73fdd7OA8zPQKWYUwpqnNRy_-vrJTnJiKZ0eiba9PRZM4PySWi-GAdZec', NULL, NULL, NULL);
COMMIT;