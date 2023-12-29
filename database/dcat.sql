/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50726 (5.7.26)
 Source Host           : 127.0.0.1:3306
 Source Schema         : dcat

 Target Server Type    : MySQL
 Target Server Version : 50726 (5.7.26)
 File Encoding         : 65001

 Date: 29/12/2023 10:21:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_extension_histories
-- ----------------------------
DROP TABLE IF EXISTS `admin_extension_histories`;
CREATE TABLE `admin_extension_histories`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `version` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `admin_extension_histories_name_index`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_extension_histories
-- ----------------------------

-- ----------------------------
-- Table structure for admin_extensions
-- ----------------------------
DROP TABLE IF EXISTS `admin_extensions`;
CREATE TABLE `admin_extensions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `is_enabled` tinyint(4) NOT NULL DEFAULT 0,
  `options` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_extensions_name_unique`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_extensions
-- ----------------------------

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `uri` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `extension` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `show` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES (1, 0, 1, 'Index', 'feather icon-bar-chart-2', '/', '', 1, '2023-12-26 07:16:32', NULL);
INSERT INTO `admin_menu` VALUES (2, 0, 2, 'Admin', 'feather icon-settings', '', '', 1, '2023-12-26 07:16:32', NULL);
INSERT INTO `admin_menu` VALUES (3, 2, 3, 'Users', '', 'auth/users', '', 1, '2023-12-26 07:16:32', NULL);
INSERT INTO `admin_menu` VALUES (4, 2, 4, 'Roles', '', 'auth/roles', '', 1, '2023-12-26 07:16:32', NULL);
INSERT INTO `admin_menu` VALUES (5, 2, 5, 'Permission', '', 'auth/permissions', '', 1, '2023-12-26 07:16:32', NULL);
INSERT INTO `admin_menu` VALUES (6, 2, 6, 'Menu', '', 'auth/menu', '', 1, '2023-12-26 07:16:32', NULL);
INSERT INTO `admin_menu` VALUES (7, 2, 7, 'Extensions', '', 'auth/extensions', '', 1, '2023-12-26 07:16:32', NULL);
INSERT INTO `admin_menu` VALUES (8, 0, 8, 'Offer', 'fa-address-card-o', 'offer', '', 1, '2023-12-26 07:43:24', '2023-12-26 07:43:24');
INSERT INTO `admin_menu` VALUES (9, 0, 9, 'Dashboard', 'fa-area-chart', NULL, '', 1, '2023-12-28 07:10:44', '2023-12-28 07:11:28');
INSERT INTO `admin_menu` VALUES (10, 9, 10, 'Notifica', 'fa-bullhorn', 'notifica', '', 1, '2023-12-28 07:13:57', '2023-12-28 07:31:41');
INSERT INTO `admin_menu` VALUES (11, 9, 11, 'LAST SALES', 'fa-align-justify', 'sale_record', '', 1, '2023-12-28 07:48:55', '2023-12-28 07:48:55');
INSERT INTO `admin_menu` VALUES (12, 9, 12, 'Real Time', 'fa-calculator', 'offer_log', '', 1, '2023-12-28 09:00:07', '2023-12-28 09:00:07');

-- ----------------------------
-- Table structure for admin_permission_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_permission_menu`;
CREATE TABLE `admin_permission_menu`  (
  `permission_id` bigint(20) NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE INDEX `admin_permission_menu_permission_id_menu_id_unique`(`permission_id`, `menu_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of admin_permission_menu
-- ----------------------------
INSERT INTO `admin_permission_menu` VALUES (1, 8, '2023-12-26 07:43:24', '2023-12-26 07:43:24');
INSERT INTO `admin_permission_menu` VALUES (2, 8, '2023-12-26 07:43:24', '2023-12-26 07:43:24');
INSERT INTO `admin_permission_menu` VALUES (3, 8, '2023-12-26 07:43:24', '2023-12-26 07:43:24');
INSERT INTO `admin_permission_menu` VALUES (4, 8, '2023-12-26 07:43:24', '2023-12-26 07:43:24');
INSERT INTO `admin_permission_menu` VALUES (5, 8, '2023-12-26 07:43:24', '2023-12-26 07:43:24');
INSERT INTO `admin_permission_menu` VALUES (6, 8, '2023-12-26 07:43:24', '2023-12-26 07:43:24');
INSERT INTO `admin_permission_menu` VALUES (1, 10, '2023-12-28 07:18:02', '2023-12-28 07:18:02');
INSERT INTO `admin_permission_menu` VALUES (2, 10, '2023-12-28 07:18:02', '2023-12-28 07:18:02');
INSERT INTO `admin_permission_menu` VALUES (3, 10, '2023-12-28 07:18:02', '2023-12-28 07:18:02');
INSERT INTO `admin_permission_menu` VALUES (4, 10, '2023-12-28 07:18:02', '2023-12-28 07:18:02');
INSERT INTO `admin_permission_menu` VALUES (5, 10, '2023-12-28 07:18:02', '2023-12-28 07:18:02');
INSERT INTO `admin_permission_menu` VALUES (6, 10, '2023-12-28 07:18:02', '2023-12-28 07:18:02');
INSERT INTO `admin_permission_menu` VALUES (1, 9, '2023-12-28 07:18:48', '2023-12-28 07:18:48');
INSERT INTO `admin_permission_menu` VALUES (2, 9, '2023-12-28 07:18:48', '2023-12-28 07:18:48');
INSERT INTO `admin_permission_menu` VALUES (3, 9, '2023-12-28 07:18:48', '2023-12-28 07:18:48');
INSERT INTO `admin_permission_menu` VALUES (4, 9, '2023-12-28 07:18:48', '2023-12-28 07:18:48');
INSERT INTO `admin_permission_menu` VALUES (5, 9, '2023-12-28 07:18:48', '2023-12-28 07:18:48');
INSERT INTO `admin_permission_menu` VALUES (6, 9, '2023-12-28 07:18:48', '2023-12-28 07:18:48');
INSERT INTO `admin_permission_menu` VALUES (1, 11, '2023-12-28 07:48:55', '2023-12-28 07:48:55');
INSERT INTO `admin_permission_menu` VALUES (2, 11, '2023-12-28 07:48:55', '2023-12-28 07:48:55');
INSERT INTO `admin_permission_menu` VALUES (3, 11, '2023-12-28 07:48:55', '2023-12-28 07:48:55');
INSERT INTO `admin_permission_menu` VALUES (4, 11, '2023-12-28 07:48:55', '2023-12-28 07:48:55');
INSERT INTO `admin_permission_menu` VALUES (5, 11, '2023-12-28 07:48:55', '2023-12-28 07:48:55');
INSERT INTO `admin_permission_menu` VALUES (6, 11, '2023-12-28 07:48:55', '2023-12-28 07:48:55');
INSERT INTO `admin_permission_menu` VALUES (1, 12, '2023-12-28 09:00:07', '2023-12-28 09:00:07');
INSERT INTO `admin_permission_menu` VALUES (2, 12, '2023-12-28 09:00:07', '2023-12-28 09:00:07');
INSERT INTO `admin_permission_menu` VALUES (3, 12, '2023-12-28 09:00:07', '2023-12-28 09:00:07');
INSERT INTO `admin_permission_menu` VALUES (4, 12, '2023-12-28 09:00:07', '2023-12-28 09:00:07');
INSERT INTO `admin_permission_menu` VALUES (5, 12, '2023-12-28 09:00:07', '2023-12-28 09:00:07');
INSERT INTO `admin_permission_menu` VALUES (6, 12, '2023-12-28 09:00:07', '2023-12-28 09:00:07');

-- ----------------------------
-- Table structure for admin_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `http_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_permissions_slug_unique`(`slug`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_permissions
-- ----------------------------
INSERT INTO `admin_permissions` VALUES (1, 'Auth management', 'auth-management', '', '', 1, 0, '2023-12-26 07:16:32', NULL);
INSERT INTO `admin_permissions` VALUES (2, 'Users', 'users', '', '/auth/users*', 2, 1, '2023-12-26 07:16:32', NULL);
INSERT INTO `admin_permissions` VALUES (3, 'Roles', 'roles', '', '/auth/roles*', 3, 1, '2023-12-26 07:16:32', NULL);
INSERT INTO `admin_permissions` VALUES (4, 'Permissions', 'permissions', '', '/auth/permissions*', 4, 1, '2023-12-26 07:16:32', NULL);
INSERT INTO `admin_permissions` VALUES (5, 'Menu', 'menu', '', '/auth/menu*', 5, 1, '2023-12-26 07:16:32', NULL);
INSERT INTO `admin_permissions` VALUES (6, 'Extension', 'extension', '', '/auth/extensions*', 6, 1, '2023-12-26 07:16:32', NULL);

-- ----------------------------
-- Table structure for admin_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE `admin_role_menu`  (
  `role_id` bigint(20) NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE INDEX `admin_role_menu_role_id_menu_id_unique`(`role_id`, `menu_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of admin_role_menu
-- ----------------------------
INSERT INTO `admin_role_menu` VALUES (1, 9, '2023-12-28 07:18:48', '2023-12-28 07:18:48');

-- ----------------------------
-- Table structure for admin_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE `admin_role_permissions`  (
  `role_id` bigint(20) NOT NULL,
  `permission_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE INDEX `admin_role_permissions_role_id_permission_id_unique`(`role_id`, `permission_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of admin_role_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for admin_role_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users`  (
  `role_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE INDEX `admin_role_users_role_id_user_id_unique`(`role_id`, `user_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of admin_role_users
-- ----------------------------
INSERT INTO `admin_role_users` VALUES (1, 1, '2023-12-26 07:16:32', '2023-12-26 07:16:32');

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_roles_slug_unique`(`slug`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------
INSERT INTO `admin_roles` VALUES (1, 'Administrator', 'administrator', '2023-12-26 07:16:32', '2023-12-26 07:16:32');

-- ----------------------------
-- Table structure for admin_settings
-- ----------------------------
DROP TABLE IF EXISTS `admin_settings`;
CREATE TABLE `admin_settings`  (
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`slug`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_settings
-- ----------------------------

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_users_username_unique`(`username`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES (1, 'admin', '$2y$10$rA2cNEZPOZ0rqnt4w8DxqOFUJJctxhT88E77EdJdCkyjjgveQBiNe', 'Administrator', NULL, '4oKVjdlf75rivMIzjNCY5ia934iQn53bhpGqc514v5fJO8jfzlVXfk9OScsV', '2023-12-26 07:16:32', '2023-12-26 07:16:32');

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '类别名称',
  `category_des` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '类别描述',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `update_at` timestamp NULL DEFAULT NULL COMMENT '更新定时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `category_name`(`category_name`) USING BTREE COMMENT '类别名称'
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'offer分类表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, '555', NULL, '2023-12-27 10:11:44', NULL);

-- ----------------------------
-- Table structure for creatives
-- ----------------------------
DROP TABLE IF EXISTS `creatives`;
CREATE TABLE `creatives`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '链接名称',
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '链接地址',
  `offer_id` int(11) NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '创意资源表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of creatives
-- ----------------------------
INSERT INTO `creatives` VALUES (1, 'first', 'www.baidu.com', 1, '2023-12-27 13:49:03', '2023-12-27 13:49:05');
INSERT INTO `creatives` VALUES (2, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `creatives` VALUES (3, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `creatives` VALUES (4, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `creatives` VALUES (5, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `creatives` VALUES (6, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `creatives` VALUES (7, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `creatives` VALUES (8, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `creatives` VALUES (9, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `creatives` VALUES (10, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `creatives` VALUES (11, 'second', 'www.baidu.com', 4, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `creatives` VALUES (12, 'second', 'www.baidu.com', 4, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `creatives` VALUES (13, 'second', 'www.baidu.com', 4, '2023-12-28 13:49:27', '2023-12-27 13:49:30');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2016_01_04_173148_create_admin_tables', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_09_07_090635_create_admin_settings_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_09_22_015815_create_admin_extensions_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_11_01_083237_update_admin_menu_table', 1);

-- ----------------------------
-- Table structure for notifica
-- ----------------------------
DROP TABLE IF EXISTS `notifica`;
CREATE TABLE `notifica`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notifica_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '通知标题',
  `notifica_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '通知详情',
  `notifica_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '通知人',
  `create_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `update_at` datetime NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `notifica_title`(`notifica_title`) USING BTREE COMMENT '通知标题'
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '消息通知表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of notifica
-- ----------------------------
INSERT INTO `notifica` VALUES (1, 'Hit The Ground Running: Your questions answered', 'Hit The Ground Running: Your questions', 'test', '2023-12-28 15:38:29', '2023-12-28 15:38:31');
INSERT INTO `notifica` VALUES (2, 'Hit The Ground Running: Your questions answered', 'Hit The Ground Running: Your questions answered11', 'Hit The Ground Runnin', '2023-12-28 15:39:16', '2023-12-28 15:39:18');

-- ----------------------------
-- Table structure for offer_log
-- ----------------------------
DROP TABLE IF EXISTS `offer_log`;
CREATE TABLE `offer_log`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_id` int(11) NULL DEFAULT NULL COMMENT 'Offer ID',
  `date` date NULL DEFAULT NULL COMMENT '日期',
  `time` date NULL DEFAULT NULL COMMENT '时间',
  `ip` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'IP',
  `net` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'NET',
  `affid` int(11) NULL DEFAULT NULL COMMENT 'AFFID',
  `cid` int(11) NULL DEFAULT NULL COMMENT 'CID',
  `sid` int(11) NULL DEFAULT NULL COMMENT 'SID',
  `revenue` decimal(10, 2) NULL DEFAULT NULL COMMENT 'REVENUE',
  `create_at` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `offer_id`(`offer_id`) USING BTREE COMMENT 'offer_id'
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'offer日志' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of offer_log
-- ----------------------------

-- ----------------------------
-- Table structure for offer_tracks
-- ----------------------------
DROP TABLE IF EXISTS `offer_tracks`;
CREATE TABLE `offer_tracks`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `track_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '链接名称',
  `track_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '链接地址',
  `offer_id` int(11) NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '商品追踪链接表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of offer_tracks
-- ----------------------------
INSERT INTO `offer_tracks` VALUES (1, 'first', 'www.baidu.com', 1, '2023-12-27 13:49:03', '2023-12-27 13:49:05');
INSERT INTO `offer_tracks` VALUES (2, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `offer_tracks` VALUES (3, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `offer_tracks` VALUES (4, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `offer_tracks` VALUES (5, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `offer_tracks` VALUES (6, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `offer_tracks` VALUES (7, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `offer_tracks` VALUES (8, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `offer_tracks` VALUES (9, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `offer_tracks` VALUES (10, 'second', 'www.baidu.com', 1, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `offer_tracks` VALUES (11, 'second', 'www.baidu.com', 4, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `offer_tracks` VALUES (12, 'second', 'www.baidu.com', 4, '2023-12-28 13:49:27', '2023-12-27 13:49:30');
INSERT INTO `offer_tracks` VALUES (13, 'second', 'www.baidu.com', 4, '2023-12-28 13:49:27', '2023-12-27 13:49:30');

-- ----------------------------
-- Table structure for offers
-- ----------------------------
DROP TABLE IF EXISTS `offers`;
CREATE TABLE `offers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '产品名称',
  `cate_id` int(11) NULL DEFAULT NULL COMMENT '分类ID',
  `des` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '产品描述',
  `offer_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '产品链接',
  `offer_price` decimal(10, 2) NULL DEFAULT NULL COMMENT '产品价格',
  `offer_status` tinyint(2) NULL DEFAULT 1 COMMENT '状态1正常，2隐藏',
  `accepted_area` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '可接受地区',
  `create_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `update_at` datetime NULL DEFAULT NULL COMMENT '更新时间',
  `updated_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '产品信息表' ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of offers
-- ----------------------------
INSERT INTO `offers` VALUES (1, 'E-commerce - CozyTime Pro INTL - All Languages - EXCLUSIVE', 1, 'E-commerce - CozyTime Pro INTL - All Languages - EXCLUSIVE', 'https://demo.fastadmin.net/assets/img/qrcode.png', 50.00, 1, 'All Geos Accepted.\r\n\r\nAlbania, Algeria, Andorra, Angola, Anguilla, Antigua and Barbuda, Argentina, Armenia, Aruba, Australia, Austria, Azerbaijan, Bahrain, Bangladesh, Barbados, Belgium, Benin, Bermuda, Bhutan, Brazil, British, Bulgaria, Burkina Faso, Cameroon, Canada, Cayman Islands, Chad, Chile, China, Christmas Island, Colombia, Comoros, Costa Rica, Croatia, Cyprus, Czech Republic, Denmark, Djibouti, Dominica, Egypt, El Salvador, Equatorial Guinea, Estonia, Ethiopia, Falkland Islands, Faroe Islands, Finland, France, French Guiana, Gabon, Gambia, Georgia, Germany, Ghana, Gibraltar, Greece, Greenland, Grenada, Guadeloupe, Guam, Guatemala, Guernsey, Guinea, Guyana, Haiti, Hong Kong, Hungary, Iceland, India, Indonesia, Ireland, Israel, Italy, Jamaica, Japan, Jersey, Jordan, Kazakhstan, Kyrgyzstan, Laos, Latvia, Lebanon, Lesotho, Liechtenstein, Lithuania, Luxembourg, Macau, Macedonia, Madagascar, Malawi, Malaysia, Maldives, Malta, Marshall Islands, Martinique, Mayotte, Mexico, Monaco, Montserrat, Mozambique, Namibia, Nepal, Netherlands, New Caledonia, New Zealand, Nicaragua, Niger, Nigeria, Norway, Oman, Pakistan, Palau, Palestine, Paraguay, Peru, Philippines, Poland, Portugal, Puerto Rico, Qatar, Reunion, Romania, Rwanda, San Marino, Saudi Arabia, Senegal, Singapore, Sint Maarten, Slovakia, Slovenia, South Africa, South Korea, Spain, St. Pierre and Miquelon, St. Vincent and Grenadines, Suriname, Sweden, Switzerland, Taiwan, Tajikistan, Tanzania, Thailand, Togo, Turkey, Turks And Caicos Islands, Uganda, United Arab Emirates, United Kingdom, United States, Uruguay, Uzbekistan, Vatican, Vietnam, Western Samoa, Zambia', '2023-12-25 18:30:39', '2023-12-29 18:30:42', NULL, NULL);
INSERT INTO `offers` VALUES (4, 'E-commerce - SkinBliss INTL - All Languages - EXCLUSIVE', 4, 'E-commerce - SkinBliss INTL - All Languages - EXCLUSIVE', 'https://demo.fastadmin.net/assets/img/qrcode.png', 100.00, 2, NULL, '2023-12-01 18:30:39', '2023-12-21 18:30:42', NULL, NULL);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for sale_record
-- ----------------------------
DROP TABLE IF EXISTS `sale_record`;
CREATE TABLE `sale_record`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_id` int(11) NULL DEFAULT NULL COMMENT 'offer_id',
  `time` datetime NULL DEFAULT NULL,
  `sale_date` datetime NULL DEFAULT NULL,
  `create_at` datetime NULL DEFAULT NULL,
  `update_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '销售记录' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sale_record
-- ----------------------------
INSERT INTO `sale_record` VALUES (1, 1, '2023-12-28 16:04:25', '2023-12-28 16:04:27', '2023-12-28 16:04:30', '2023-12-28 16:04:32');
INSERT INTO `sale_record` VALUES (2, 1, '2023-12-28 16:04:25', '2023-12-28 16:04:27', '2023-12-28 16:04:30', '2023-12-28 16:04:32');
INSERT INTO `sale_record` VALUES (3, 1, '2023-12-28 16:04:25', '2023-12-28 16:04:27', '2023-12-28 16:04:30', '2023-12-28 16:04:32');
INSERT INTO `sale_record` VALUES (4, 1, '2023-12-28 16:04:25', '2023-12-28 16:04:27', '2023-12-28 16:04:30', '2023-12-28 16:04:32');

-- ----------------------------
-- Table structure for switch_grid_view
-- ----------------------------
DROP TABLE IF EXISTS `switch_grid_view`;
CREATE TABLE `switch_grid_view`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of switch_grid_view
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
