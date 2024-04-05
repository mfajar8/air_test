/*
 Navicat Premium Data Transfer

 Source Server         : local-DB
 Source Server Type    : MySQL
 Source Server Version : 100427 (10.4.27-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : air_test

 Target Server Type    : MySQL
 Target Server Version : 100427 (10.4.27-MariaDB)
 File Encoding         : 65001

 Date: 05/04/2024 10:41:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for luwes_data
-- ----------------------------
DROP TABLE IF EXISTS `luwes_data`;
CREATE TABLE `luwes_data`  (
  `no` int NOT NULL AUTO_INCREMENT,
  `id` int NULL DEFAULT NULL,
  `imei` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `level_sensor` double NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `rec` bigint NULL DEFAULT NULL,
  `submitted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`no`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of luwes_data
-- ----------------------------
INSERT INTO `luwes_data` VALUES (1, 596, '869556066072316', 13.179, 'Balai Air Tanah PUPR', 107201999, '2024-03-31 05:08:00');
INSERT INTO `luwes_data` VALUES (2, 596, '869556066072316', 13.195, 'Balai Air Tanah PUPR', 107202140, '2024-03-31 05:21:00');
INSERT INTO `luwes_data` VALUES (3, 596, '869556066072316', 13.201, 'Balai Air Tanah PUPR', 107202172, '2024-03-31 05:25:00');
INSERT INTO `luwes_data` VALUES (4, 596, '869556066072316', 13.203, 'Balai Air Tanah PUPR', 107202189, '2024-03-31 05:27:00');
INSERT INTO `luwes_data` VALUES (5, 596, '869556066072316', 13.206, 'Balai Air Tanah PUPR', 107202204, '2024-03-31 05:29:00');
INSERT INTO `luwes_data` VALUES (6, 596, '869556066072316', 13.21, 'Balai Air Tanah PUPR', 107202240, '2024-03-31 05:31:00');
INSERT INTO `luwes_data` VALUES (7, 596, '869556066072316', 13.212, 'Balai Air Tanah PUPR', 107202261, '2024-03-31 05:33:00');
INSERT INTO `luwes_data` VALUES (8, 596, '869556066072316', 13.215, 'Balai Air Tanah PUPR', 107202285, '2024-03-31 05:35:00');
INSERT INTO `luwes_data` VALUES (9, 596, '869556066072316', 13.217, 'Balai Air Tanah PUPR', 107202306, '2024-03-31 05:37:00');
INSERT INTO `luwes_data` VALUES (10, 596, '869556066072316', 13.22, 'Balai Air Tanah PUPR', 107202329, '2024-03-31 05:39:00');
INSERT INTO `luwes_data` VALUES (11, 596, '869556066072316', 13.222, 'Balai Air Tanah PUPR', 107202374, '2024-03-31 05:41:00');
INSERT INTO `luwes_data` VALUES (12, 596, '869556066072316', 13.225, 'Balai Air Tanah PUPR', 107202398, '2024-03-31 05:43:00');
INSERT INTO `luwes_data` VALUES (13, 596, '869556066072316', 13.227, 'Balai Air Tanah PUPR', 107202417, '2024-03-31 05:45:00');
INSERT INTO `luwes_data` VALUES (14, 596, '869556066072316', 13.23, 'Balai Air Tanah PUPR', 107202437, '2024-03-31 05:47:00');
INSERT INTO `luwes_data` VALUES (15, 596, '869556066072316', 13.232, 'Balai Air Tanah PUPR', 107202457, '2024-03-31 05:49:00');
INSERT INTO `luwes_data` VALUES (16, 596, '869556066072316', 13.235, 'Balai Air Tanah PUPR', 107202486, '2024-03-31 05:51:00');
INSERT INTO `luwes_data` VALUES (17, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (18, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (19, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (20, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (21, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (22, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (23, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (24, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (25, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (26, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (27, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (28, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (29, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (30, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (31, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (32, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (33, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (34, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (35, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (36, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (37, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (38, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');
INSERT INTO `luwes_data` VALUES (39, 596, '869556066072316', 13.382, 'Balai Air Tanah PUPR', 107276365, '2024-04-03 18:45:00');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_05_20_075558_bbwsc_office', 1);
INSERT INTO `migrations` VALUES (6, '2023_05_20_080200_create_archive_table', 1);
INSERT INTO `migrations` VALUES (7, '2023_05_20_080437_create_division_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_05_20_080519_create_files_table', 1);
INSERT INTO `migrations` VALUES (9, '2023_05_20_080609_create_archive_responsibility_table', 1);
INSERT INTO `migrations` VALUES (10, '2023_05_20_081221_add_column_to_users_table', 1);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role` int NULL DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` int NULL DEFAULT NULL,
  `pict` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Mochamad Fajar Ismatulloh', 'mfajar16@gmail.com', '$2y$12$pceqnqGrEt3go8s3Z2HJTusELIu6TM0vaQpX4Py2M4kROHXc7Coo6', NULL, 1, 'Administrator', 1, 'fajar.jpg', '2024-04-04 05:47:44', NULL, NULL);
INSERT INTO `users` VALUES (2, 'KUDA', 'kudatampan08@gmail.com', '$2y$12$pceqnqGrEt3go8s3Z2HJTusELIu6TM0vaQpX4Py2M4kROHXc7Coo6', NULL, 1, 'Administrator', 1, NULL, '2024-04-04 06:15:05', NULL, NULL);
INSERT INTO `users` VALUES (3, 'jajat', 'jajat@gmail.com', '$2y$12$pceqnqGrEt3go8s3Z2HJTusELIu6TM0vaQpX4Py2M4kROHXc7Coo6', NULL, 2, 'Manager', 1, NULL, '2024-04-04 06:32:58', NULL, NULL);
INSERT INTO `users` VALUES (4, 'JAFAR', 'jafar@gmail.com', '$2y$12$pceqnqGrEt3go8s3Z2HJTusELIu6TM0vaQpX4Py2M4kROHXc7Coo6', NULL, 2, 'Manager', 1, NULL, '2024-04-05 03:33:20', NULL, NULL);
INSERT INTO `users` VALUES (5, 'Aqua', 'aqua@gmail.com', '$2y$12$pceqnqGrEt3go8s3Z2HJTusELIu6TM0vaQpX4Py2M4kROHXc7Coo6', NULL, 3, 'Staff', 0, NULL, '2024-04-04 06:27:11', NULL, NULL);
INSERT INTO `users` VALUES (6, 'Ojan', 'ojan@gmail.com', '$2y$12$yAwlPlh0VlXJ9o2wbTAwmuVjaW5bdcrPdjva65s8rDo/7DYGRltne', NULL, 3, 'Staff', 0, NULL, '2024-04-04 05:34:28', '2024-04-04 05:34:28', NULL);
INSERT INTO `users` VALUES (7, 'Mamun', 'mamun@gmail.com', '$2y$12$Nb36/FGDIg4Cb861sHHIFOmBZSdP9t19qzrjBOFBMLAxqo80tiyiO', NULL, 2, 'Manager', 1, NULL, '2024-04-05 03:34:18', '2024-04-05 03:34:18', NULL);

SET FOREIGN_KEY_CHECKS = 1;
