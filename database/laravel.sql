/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50726 (5.7.26)
 Source Host           : 127.0.0.1:3306
 Source Schema         : laravel

 Target Server Type    : MySQL
 Target Server Version : 50726 (5.7.26)
 File Encoding         : 65001

 Date: 03/01/2024 14:54:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_menu`;
CREATE TABLE `admin_menu`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `permission` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_menu
-- ----------------------------
INSERT INTO `admin_menu` VALUES (1, 0, 1, 'Dashboard', 'fa-bar-chart', '/', NULL, NULL, NULL);
INSERT INTO `admin_menu` VALUES (2, 0, 2, 'Admin', 'fa-tasks', '', NULL, NULL, NULL);
INSERT INTO `admin_menu` VALUES (3, 2, 4, 'Users', 'fa-users', 'auth/users', NULL, NULL, '2023-12-25 10:25:34');
INSERT INTO `admin_menu` VALUES (4, 2, 5, 'Roles', 'fa-user', 'auth/roles', NULL, NULL, '2023-12-25 10:25:34');
INSERT INTO `admin_menu` VALUES (5, 2, 6, 'Permission', 'fa-ban', 'auth/permissions', NULL, NULL, '2023-12-25 10:25:34');
INSERT INTO `admin_menu` VALUES (6, 2, 7, 'Menu', 'fa-bars', 'auth/menu', NULL, NULL, '2023-12-25 10:25:34');
INSERT INTO `admin_menu` VALUES (7, 2, 8, 'Operation log', 'fa-history', 'auth/logs', NULL, NULL, '2023-12-25 10:25:34');
INSERT INTO `admin_menu` VALUES (8, 0, 3, 'Offer', 'fa-adn', 'offer', '*', '2023-12-25 10:21:30', '2023-12-25 10:29:42');
INSERT INTO `admin_menu` VALUES (9, 0, 0, '产品', 'fa-bars', 'product/show', NULL, '2023-12-26 03:50:51', '2023-12-26 05:20:32');

-- ----------------------------
-- Table structure for admin_operation_log
-- ----------------------------
DROP TABLE IF EXISTS `admin_operation_log`;
CREATE TABLE `admin_operation_log`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `admin_operation_log_user_id_index`(`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 696 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_operation_log
-- ----------------------------
INSERT INTO `admin_operation_log` VALUES (1, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-25 06:42:04', '2023-12-25 06:42:04');
INSERT INTO `admin_operation_log` VALUES (2, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-25 06:44:23', '2023-12-25 06:44:23');
INSERT INTO `admin_operation_log` VALUES (3, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-25 06:44:26', '2023-12-25 06:44:26');
INSERT INTO `admin_operation_log` VALUES (4, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:44:30', '2023-12-25 06:44:30');
INSERT INTO `admin_operation_log` VALUES (5, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:44:32', '2023-12-25 06:44:32');
INSERT INTO `admin_operation_log` VALUES (6, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:44:34', '2023-12-25 06:44:34');
INSERT INTO `admin_operation_log` VALUES (7, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:44:35', '2023-12-25 06:44:35');
INSERT INTO `admin_operation_log` VALUES (8, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:44:38', '2023-12-25 06:44:38');
INSERT INTO `admin_operation_log` VALUES (9, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:44:40', '2023-12-25 06:44:40');
INSERT INTO `admin_operation_log` VALUES (10, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:44:41', '2023-12-25 06:44:41');
INSERT INTO `admin_operation_log` VALUES (11, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:50:33', '2023-12-25 06:50:33');
INSERT INTO `admin_operation_log` VALUES (12, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:50:34', '2023-12-25 06:50:34');
INSERT INTO `admin_operation_log` VALUES (13, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:50:35', '2023-12-25 06:50:35');
INSERT INTO `admin_operation_log` VALUES (14, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:50:37', '2023-12-25 06:50:37');
INSERT INTO `admin_operation_log` VALUES (15, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:50:39', '2023-12-25 06:50:39');
INSERT INTO `admin_operation_log` VALUES (16, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:50:42', '2023-12-25 06:50:42');
INSERT INTO `admin_operation_log` VALUES (17, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:50:50', '2023-12-25 06:50:50');
INSERT INTO `admin_operation_log` VALUES (18, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:50:59', '2023-12-25 06:50:59');
INSERT INTO `admin_operation_log` VALUES (19, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:51:01', '2023-12-25 06:51:01');
INSERT INTO `admin_operation_log` VALUES (20, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:51:02', '2023-12-25 06:51:02');
INSERT INTO `admin_operation_log` VALUES (21, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:51:03', '2023-12-25 06:51:03');
INSERT INTO `admin_operation_log` VALUES (22, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 06:51:19', '2023-12-25 06:51:19');
INSERT INTO `admin_operation_log` VALUES (23, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-25 06:58:00', '2023-12-25 06:58:00');
INSERT INTO `admin_operation_log` VALUES (24, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-25 06:58:04', '2023-12-25 06:58:04');
INSERT INTO `admin_operation_log` VALUES (25, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 07:00:08', '2023-12-25 07:00:08');
INSERT INTO `admin_operation_log` VALUES (26, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 07:00:08', '2023-12-25 07:00:08');
INSERT INTO `admin_operation_log` VALUES (27, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 07:00:09', '2023-12-25 07:00:09');
INSERT INTO `admin_operation_log` VALUES (28, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 07:00:10', '2023-12-25 07:00:10');
INSERT INTO `admin_operation_log` VALUES (29, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 07:00:19', '2023-12-25 07:00:19');
INSERT INTO `admin_operation_log` VALUES (30, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-12-25 07:40:07', '2023-12-25 07:40:07');
INSERT INTO `admin_operation_log` VALUES (31, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 07:40:15', '2023-12-25 07:40:15');
INSERT INTO `admin_operation_log` VALUES (32, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 07:41:35', '2023-12-25 07:41:35');
INSERT INTO `admin_operation_log` VALUES (33, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-12-25 08:14:59', '2023-12-25 08:14:59');
INSERT INTO `admin_operation_log` VALUES (34, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:20:25', '2023-12-25 08:20:25');
INSERT INTO `admin_operation_log` VALUES (35, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:23:36', '2023-12-25 08:23:36');
INSERT INTO `admin_operation_log` VALUES (36, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:24:02', '2023-12-25 08:24:02');
INSERT INTO `admin_operation_log` VALUES (37, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:24:04', '2023-12-25 08:24:04');
INSERT INTO `admin_operation_log` VALUES (38, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:33:47', '2023-12-25 08:33:47');
INSERT INTO `admin_operation_log` VALUES (39, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:33:48', '2023-12-25 08:33:48');
INSERT INTO `admin_operation_log` VALUES (40, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:33:49', '2023-12-25 08:33:49');
INSERT INTO `admin_operation_log` VALUES (41, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:33:52', '2023-12-25 08:33:52');
INSERT INTO `admin_operation_log` VALUES (42, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:36:23', '2023-12-25 08:36:23');
INSERT INTO `admin_operation_log` VALUES (43, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-25 08:44:55', '2023-12-25 08:44:55');
INSERT INTO `admin_operation_log` VALUES (44, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:44:57', '2023-12-25 08:44:57');
INSERT INTO `admin_operation_log` VALUES (45, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:45:00', '2023-12-25 08:45:00');
INSERT INTO `admin_operation_log` VALUES (46, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-12-25 08:47:23', '2023-12-25 08:47:23');
INSERT INTO `admin_operation_log` VALUES (47, 1, 'admin/auth/users/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:47:32', '2023-12-25 08:47:32');
INSERT INTO `admin_operation_log` VALUES (48, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:47:46', '2023-12-25 08:47:46');
INSERT INTO `admin_operation_log` VALUES (49, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:47:48', '2023-12-25 08:47:48');
INSERT INTO `admin_operation_log` VALUES (50, 1, 'admin/auth/roles/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:47:50', '2023-12-25 08:47:50');
INSERT INTO `admin_operation_log` VALUES (51, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:48:42', '2023-12-25 08:48:42');
INSERT INTO `admin_operation_log` VALUES (52, 1, 'admin/auth/roles/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:48:45', '2023-12-25 08:48:45');
INSERT INTO `admin_operation_log` VALUES (53, 1, 'admin/auth/roles', 'POST', '127.0.0.1', '{\"slug\":\"33\",\"name\":\"44\",\"permissions\":[\"2\",\"3\",null],\"_token\":\"jP7tFDhjrfjL7I73jM2zjiDiSrJbVntFhVqGPEKL\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/auth\\/roles\"}', '2023-12-25 08:49:04', '2023-12-25 08:49:04');
INSERT INTO `admin_operation_log` VALUES (54, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '[]', '2023-12-25 08:49:04', '2023-12-25 08:49:04');
INSERT INTO `admin_operation_log` VALUES (55, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 08:49:18', '2023-12-25 08:49:18');
INSERT INTO `admin_operation_log` VALUES (56, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-25 10:01:52', '2023-12-25 10:01:52');
INSERT INTO `admin_operation_log` VALUES (57, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-25 10:19:26', '2023-12-25 10:19:26');
INSERT INTO `admin_operation_log` VALUES (58, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:20:31', '2023-12-25 10:20:31');
INSERT INTO `admin_operation_log` VALUES (59, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Offer\",\"icon\":\"fa-adn\",\"uri\":\"offer\",\"roles\":[null],\"permission\":\"*\",\"_token\":\"jP7tFDhjrfjL7I73jM2zjiDiSrJbVntFhVqGPEKL\"}', '2023-12-25 10:21:30', '2023-12-25 10:21:30');
INSERT INTO `admin_operation_log` VALUES (60, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-25 10:21:30', '2023-12-25 10:21:30');
INSERT INTO `admin_operation_log` VALUES (61, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:21:40', '2023-12-25 10:21:40');
INSERT INTO `admin_operation_log` VALUES (62, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-25 10:21:43', '2023-12-25 10:21:43');
INSERT INTO `admin_operation_log` VALUES (63, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:21:54', '2023-12-25 10:21:54');
INSERT INTO `admin_operation_log` VALUES (64, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:22:00', '2023-12-25 10:22:00');
INSERT INTO `admin_operation_log` VALUES (65, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-25 10:22:42', '2023-12-25 10:22:42');
INSERT INTO `admin_operation_log` VALUES (66, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:22:48', '2023-12-25 10:22:48');
INSERT INTO `admin_operation_log` VALUES (67, 1, 'admin/auth/menu/8/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:22:52', '2023-12-25 10:22:52');
INSERT INTO `admin_operation_log` VALUES (68, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:23:04', '2023-12-25 10:23:04');
INSERT INTO `admin_operation_log` VALUES (69, 1, 'admin/auth/menu/8/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:23:16', '2023-12-25 10:23:16');
INSERT INTO `admin_operation_log` VALUES (70, 1, 'admin/auth/menu/8', 'PUT', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Offer\",\"icon\":\"fa-adn\",\"uri\":\"offer\",\"roles\":[null],\"permission\":\"*\",\"_token\":\"jP7tFDhjrfjL7I73jM2zjiDiSrJbVntFhVqGPEKL\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/auth\\/menu\"}', '2023-12-25 10:23:42', '2023-12-25 10:23:42');
INSERT INTO `admin_operation_log` VALUES (71, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-25 10:23:43', '2023-12-25 10:23:43');
INSERT INTO `admin_operation_log` VALUES (72, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:23:49', '2023-12-25 10:23:49');
INSERT INTO `admin_operation_log` VALUES (73, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-25 10:23:52', '2023-12-25 10:23:52');
INSERT INTO `admin_operation_log` VALUES (74, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:24:02', '2023-12-25 10:24:02');
INSERT INTO `admin_operation_log` VALUES (75, 1, 'admin/auth/menu/6/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:24:15', '2023-12-25 10:24:15');
INSERT INTO `admin_operation_log` VALUES (76, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:24:23', '2023-12-25 10:24:23');
INSERT INTO `admin_operation_log` VALUES (77, 1, 'admin/auth/menu/8/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:24:26', '2023-12-25 10:24:26');
INSERT INTO `admin_operation_log` VALUES (78, 1, 'admin/auth/menu/8', 'PUT', '127.0.0.1', '{\"parent_id\":\"2\",\"title\":\"Offer\",\"icon\":\"fa-adn\",\"uri\":\"auth\\/offer\",\"roles\":[null],\"permission\":\"*\",\"_token\":\"jP7tFDhjrfjL7I73jM2zjiDiSrJbVntFhVqGPEKL\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/auth\\/menu\"}', '2023-12-25 10:24:37', '2023-12-25 10:24:37');
INSERT INTO `admin_operation_log` VALUES (79, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-25 10:24:37', '2023-12-25 10:24:37');
INSERT INTO `admin_operation_log` VALUES (80, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-25 10:24:51', '2023-12-25 10:24:51');
INSERT INTO `admin_operation_log` VALUES (81, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-25 10:25:14', '2023-12-25 10:25:14');
INSERT INTO `admin_operation_log` VALUES (82, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"_token\":\"jP7tFDhjrfjL7I73jM2zjiDiSrJbVntFhVqGPEKL\",\"_order\":\"[{\\\"id\\\":1},{\\\"id\\\":2,\\\"children\\\":[{\\\"id\\\":8},{\\\"id\\\":3},{\\\"id\\\":4},{\\\"id\\\":5},{\\\"id\\\":6},{\\\"id\\\":7}]}]\"}', '2023-12-25 10:25:34', '2023-12-25 10:25:34');
INSERT INTO `admin_operation_log` VALUES (83, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:25:34', '2023-12-25 10:25:34');
INSERT INTO `admin_operation_log` VALUES (84, 1, 'admin/auth/menu/5/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:25:40', '2023-12-25 10:25:40');
INSERT INTO `admin_operation_log` VALUES (85, 1, 'admin/auth/menu/5/edit', 'GET', '127.0.0.1', '[]', '2023-12-25 10:26:05', '2023-12-25 10:26:05');
INSERT INTO `admin_operation_log` VALUES (86, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:26:10', '2023-12-25 10:26:10');
INSERT INTO `admin_operation_log` VALUES (87, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:26:13', '2023-12-25 10:26:13');
INSERT INTO `admin_operation_log` VALUES (88, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:26:19', '2023-12-25 10:26:19');
INSERT INTO `admin_operation_log` VALUES (89, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '[]', '2023-12-25 10:28:12', '2023-12-25 10:28:12');
INSERT INTO `admin_operation_log` VALUES (90, 1, 'admin/auth/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:28:16', '2023-12-25 10:28:16');
INSERT INTO `admin_operation_log` VALUES (91, 1, 'admin/auth/offer', 'GET', '127.0.0.1', '[]', '2023-12-25 10:29:08', '2023-12-25 10:29:08');
INSERT INTO `admin_operation_log` VALUES (92, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:29:11', '2023-12-25 10:29:11');
INSERT INTO `admin_operation_log` VALUES (93, 1, 'admin/auth/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:29:11', '2023-12-25 10:29:11');
INSERT INTO `admin_operation_log` VALUES (94, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:29:28', '2023-12-25 10:29:28');
INSERT INTO `admin_operation_log` VALUES (95, 1, 'admin/auth/menu/8/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:29:33', '2023-12-25 10:29:33');
INSERT INTO `admin_operation_log` VALUES (96, 1, 'admin/auth/menu/8', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"Offer\",\"icon\":\"fa-adn\",\"uri\":\"offer\",\"roles\":[null],\"permission\":\"*\",\"_token\":\"jP7tFDhjrfjL7I73jM2zjiDiSrJbVntFhVqGPEKL\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/auth\\/menu\"}', '2023-12-25 10:29:42', '2023-12-25 10:29:42');
INSERT INTO `admin_operation_log` VALUES (97, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-25 10:29:42', '2023-12-25 10:29:42');
INSERT INTO `admin_operation_log` VALUES (98, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:29:47', '2023-12-25 10:29:47');
INSERT INTO `admin_operation_log` VALUES (99, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-25 10:29:51', '2023-12-25 10:29:51');
INSERT INTO `admin_operation_log` VALUES (100, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:29:59', '2023-12-25 10:29:59');
INSERT INTO `admin_operation_log` VALUES (101, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-25 10:30:50', '2023-12-25 10:30:50');
INSERT INTO `admin_operation_log` VALUES (102, 1, 'admin/offer/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:30:55', '2023-12-25 10:30:55');
INSERT INTO `admin_operation_log` VALUES (103, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:30:58', '2023-12-25 10:30:58');
INSERT INTO `admin_operation_log` VALUES (104, 1, 'admin/offer/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:31:03', '2023-12-25 10:31:03');
INSERT INTO `admin_operation_log` VALUES (105, 1, 'admin/offer/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:31:12', '2023-12-25 10:31:12');
INSERT INTO `admin_operation_log` VALUES (106, 1, 'admin/offer/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:31:15', '2023-12-25 10:31:15');
INSERT INTO `admin_operation_log` VALUES (107, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:31:17', '2023-12-25 10:31:17');
INSERT INTO `admin_operation_log` VALUES (108, 1, 'admin/offer/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:31:30', '2023-12-25 10:31:30');
INSERT INTO `admin_operation_log` VALUES (109, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:31:55', '2023-12-25 10:31:55');
INSERT INTO `admin_operation_log` VALUES (110, 1, 'admin/offer/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:32:07', '2023-12-25 10:32:07');
INSERT INTO `admin_operation_log` VALUES (111, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-25 10:45:04', '2023-12-25 10:45:04');
INSERT INTO `admin_operation_log` VALUES (112, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-26 01:08:51', '2023-12-26 01:08:51');
INSERT INTO `admin_operation_log` VALUES (113, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:08:54', '2023-12-26 01:08:54');
INSERT INTO `admin_operation_log` VALUES (114, 1, 'admin/offer/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:14:05', '2023-12-26 01:14:05');
INSERT INTO `admin_operation_log` VALUES (115, 1, 'admin/offer', 'POST', '127.0.0.1', '{\"offer_name\":\"test\",\"cate_id\":\"2\",\"des\":\"123213213\",\"offer_link\":\"www.baidu.com\",\"offer_price\":\"100\",\"offer_status\":\"on\",\"create_at\":\"2023-12-26 01:14:05\",\"update_at\":\"2023-12-26 01:14:05\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/offer\"}', '2023-12-26 01:14:51', '2023-12-26 01:14:51');
INSERT INTO `admin_operation_log` VALUES (116, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:14:51', '2023-12-26 01:14:51');
INSERT INTO `admin_operation_log` VALUES (117, 1, 'admin/offer', 'POST', '127.0.0.1', '{\"offer_name\":\"test\",\"cate_id\":\"2\",\"des\":\"123213213\",\"offer_link\":\"www.baidu.com\",\"offer_price\":\"100\",\"offer_status\":\"on\",\"create_at\":\"2023-12-26 01:14:05\",\"update_at\":\"2023-12-26 01:14:05\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\"}', '2023-12-26 01:15:33', '2023-12-26 01:15:33');
INSERT INTO `admin_operation_log` VALUES (118, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:15:34', '2023-12-26 01:15:34');
INSERT INTO `admin_operation_log` VALUES (119, 1, 'admin/offer', 'POST', '127.0.0.1', '{\"offer_name\":\"test\",\"cate_id\":\"2\",\"des\":\"123213213\",\"offer_link\":\"www.baidu.com\",\"offer_price\":\"100\",\"offer_status\":\"on\",\"create_at\":\"2023-12-26 01:14:05\",\"update_at\":\"2023-12-26 01:14:05\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\"}', '2023-12-26 01:16:00', '2023-12-26 01:16:00');
INSERT INTO `admin_operation_log` VALUES (120, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:16:00', '2023-12-26 01:16:00');
INSERT INTO `admin_operation_log` VALUES (121, 1, 'admin/offer', 'POST', '127.0.0.1', '{\"offer_name\":\"test\",\"cate_id\":\"2\",\"des\":\"123213213\",\"offer_link\":\"www.baidu.com\",\"offer_price\":\"100\",\"offer_status\":\"on\",\"create_at\":\"2023-12-26 01:14:05\",\"update_at\":\"2023-12-26 01:14:05\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\"}', '2023-12-26 01:16:14', '2023-12-26 01:16:14');
INSERT INTO `admin_operation_log` VALUES (122, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:16:14', '2023-12-26 01:16:14');
INSERT INTO `admin_operation_log` VALUES (123, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:16:54', '2023-12-26 01:16:54');
INSERT INTO `admin_operation_log` VALUES (124, 1, 'admin/offer/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:16:57', '2023-12-26 01:16:57');
INSERT INTO `admin_operation_log` VALUES (125, 1, 'admin/offer', 'POST', '127.0.0.1', '{\"offer_name\":\"123\",\"cate_id\":\"1\",\"des\":\"123\",\"offer_link\":\"12333\",\"offer_price\":\"123\",\"offer_status\":\"on\",\"create_at\":\"2023-12-26 01:16:57\",\"update_at\":\"2023-12-26 01:16:57\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/offer\"}', '2023-12-26 01:17:05', '2023-12-26 01:17:05');
INSERT INTO `admin_operation_log` VALUES (126, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:17:05', '2023-12-26 01:17:05');
INSERT INTO `admin_operation_log` VALUES (127, 1, 'admin/offer', 'POST', '127.0.0.1', '{\"offer_name\":\"123\",\"cate_id\":\"1\",\"des\":\"123\",\"offer_link\":\"12333\",\"offer_price\":\"123\",\"offer_status\":\"on\",\"create_at\":\"2023-12-26 01:16:57\",\"update_at\":\"2023-12-26 01:16:57\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\"}', '2023-12-26 01:17:24', '2023-12-26 01:17:24');
INSERT INTO `admin_operation_log` VALUES (128, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:17:24', '2023-12-26 01:17:24');
INSERT INTO `admin_operation_log` VALUES (129, 1, 'admin/offer', 'POST', '127.0.0.1', '{\"offer_name\":\"123\",\"cate_id\":\"1\",\"des\":\"123\",\"offer_link\":\"12333\",\"offer_price\":\"123\",\"offer_status\":\"on\",\"create_at\":\"2023-12-26 01:16:57\",\"update_at\":\"2023-12-26 01:16:57\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\"}', '2023-12-26 01:17:58', '2023-12-26 01:17:58');
INSERT INTO `admin_operation_log` VALUES (130, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:17:58', '2023-12-26 01:17:58');
INSERT INTO `admin_operation_log` VALUES (131, 1, 'admin/offer', 'POST', '127.0.0.1', '{\"offer_name\":\"123\",\"cate_id\":\"1\",\"des\":\"123\",\"offer_link\":\"12333\",\"offer_price\":\"123\",\"offer_status\":\"on\",\"create_at\":\"2023-12-26 01:16:57\",\"update_at\":\"2023-12-26 01:16:57\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\"}', '2023-12-26 01:18:14', '2023-12-26 01:18:14');
INSERT INTO `admin_operation_log` VALUES (132, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 01:18:14', '2023-12-26 01:18:14');
INSERT INTO `admin_operation_log` VALUES (133, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_export_\":\"all\"}', '2023-12-26 01:18:22', '2023-12-26 01:18:22');
INSERT INTO `admin_operation_log` VALUES (134, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 01:23:17', '2023-12-26 01:23:17');
INSERT INTO `admin_operation_log` VALUES (135, 1, 'admin/offer/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:23:20', '2023-12-26 01:23:20');
INSERT INTO `admin_operation_log` VALUES (136, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:27:03', '2023-12-26 01:27:03');
INSERT INTO `admin_operation_log` VALUES (137, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:27:13', '2023-12-26 01:27:13');
INSERT INTO `admin_operation_log` VALUES (138, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:27:17', '2023-12-26 01:27:17');
INSERT INTO `admin_operation_log` VALUES (139, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:27:18', '2023-12-26 01:27:18');
INSERT INTO `admin_operation_log` VALUES (140, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:27:20', '2023-12-26 01:27:20');
INSERT INTO `admin_operation_log` VALUES (141, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:27:22', '2023-12-26 01:27:22');
INSERT INTO `admin_operation_log` VALUES (142, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:27:34', '2023-12-26 01:27:34');
INSERT INTO `admin_operation_log` VALUES (143, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:35:40', '2023-12-26 01:35:40');
INSERT INTO `admin_operation_log` VALUES (144, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:36:41', '2023-12-26 01:36:41');
INSERT INTO `admin_operation_log` VALUES (145, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:36:45', '2023-12-26 01:36:45');
INSERT INTO `admin_operation_log` VALUES (146, 1, 'admin/auth/setting', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:36:47', '2023-12-26 01:36:47');
INSERT INTO `admin_operation_log` VALUES (147, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:38:23', '2023-12-26 01:38:23');
INSERT INTO `admin_operation_log` VALUES (148, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-26 01:38:26', '2023-12-26 01:38:26');
INSERT INTO `admin_operation_log` VALUES (149, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-26 01:40:45', '2023-12-26 01:40:45');
INSERT INTO `admin_operation_log` VALUES (150, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:40:49', '2023-12-26 01:40:49');
INSERT INTO `admin_operation_log` VALUES (151, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 01:41:35', '2023-12-26 01:41:35');
INSERT INTO `admin_operation_log` VALUES (152, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 01:41:51', '2023-12-26 01:41:51');
INSERT INTO `admin_operation_log` VALUES (153, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 01:42:03', '2023-12-26 01:42:03');
INSERT INTO `admin_operation_log` VALUES (154, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 01:42:40', '2023-12-26 01:42:40');
INSERT INTO `admin_operation_log` VALUES (155, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 01:42:49', '2023-12-26 01:42:49');
INSERT INTO `admin_operation_log` VALUES (156, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 01:44:50', '2023-12-26 01:44:50');
INSERT INTO `admin_operation_log` VALUES (157, 1, 'admin/offer/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:45:00', '2023-12-26 01:45:00');
INSERT INTO `admin_operation_log` VALUES (158, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:45:04', '2023-12-26 01:45:04');
INSERT INTO `admin_operation_log` VALUES (159, 1, 'admin/offer/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:45:06', '2023-12-26 01:45:06');
INSERT INTO `admin_operation_log` VALUES (160, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:45:10', '2023-12-26 01:45:10');
INSERT INTO `admin_operation_log` VALUES (161, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:45:30', '2023-12-26 01:45:30');
INSERT INTO `admin_operation_log` VALUES (162, 1, 'admin/offer/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:45:35', '2023-12-26 01:45:35');
INSERT INTO `admin_operation_log` VALUES (163, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:45:38', '2023-12-26 01:45:38');
INSERT INTO `admin_operation_log` VALUES (164, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 01:47:35', '2023-12-26 01:47:35');
INSERT INTO `admin_operation_log` VALUES (165, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 01:48:50', '2023-12-26 01:48:50');
INSERT INTO `admin_operation_log` VALUES (166, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:48:58', '2023-12-26 01:48:58');
INSERT INTO `admin_operation_log` VALUES (167, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:49:12', '2023-12-26 01:49:12');
INSERT INTO `admin_operation_log` VALUES (168, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:49:12', '2023-12-26 01:49:12');
INSERT INTO `admin_operation_log` VALUES (169, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:49:17', '2023-12-26 01:49:17');
INSERT INTO `admin_operation_log` VALUES (170, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:49:17', '2023-12-26 01:49:17');
INSERT INTO `admin_operation_log` VALUES (171, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:49:26', '2023-12-26 01:49:26');
INSERT INTO `admin_operation_log` VALUES (172, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:49:28', '2023-12-26 01:49:28');
INSERT INTO `admin_operation_log` VALUES (173, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:49:29', '2023-12-26 01:49:29');
INSERT INTO `admin_operation_log` VALUES (174, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:49:33', '2023-12-26 01:49:33');
INSERT INTO `admin_operation_log` VALUES (175, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:49:35', '2023-12-26 01:49:35');
INSERT INTO `admin_operation_log` VALUES (176, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:49:35', '2023-12-26 01:49:35');
INSERT INTO `admin_operation_log` VALUES (177, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:50:06', '2023-12-26 01:50:06');
INSERT INTO `admin_operation_log` VALUES (178, 1, 'admin/offer/create', 'GET', '127.0.0.1', '[]', '2023-12-26 01:50:19', '2023-12-26 01:50:19');
INSERT INTO `admin_operation_log` VALUES (179, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:50:21', '2023-12-26 01:50:21');
INSERT INTO `admin_operation_log` VALUES (180, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 01:52:01', '2023-12-26 01:52:01');
INSERT INTO `admin_operation_log` VALUES (181, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\",\"_pjax\":\"#pjax-container\"}', '2023-12-26 01:52:10', '2023-12-26 01:52:10');
INSERT INTO `admin_operation_log` VALUES (182, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:17:43', '2023-12-26 02:17:43');
INSERT INTO `admin_operation_log` VALUES (183, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:18:06', '2023-12-26 02:18:06');
INSERT INTO `admin_operation_log` VALUES (184, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:20:58', '2023-12-26 02:20:58');
INSERT INTO `admin_operation_log` VALUES (185, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:21:23', '2023-12-26 02:21:23');
INSERT INTO `admin_operation_log` VALUES (186, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:21:56', '2023-12-26 02:21:56');
INSERT INTO `admin_operation_log` VALUES (187, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:22:28', '2023-12-26 02:22:28');
INSERT INTO `admin_operation_log` VALUES (188, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:22:30', '2023-12-26 02:22:30');
INSERT INTO `admin_operation_log` VALUES (189, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:37:45', '2023-12-26 02:37:45');
INSERT INTO `admin_operation_log` VALUES (190, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:37:59', '2023-12-26 02:37:59');
INSERT INTO `admin_operation_log` VALUES (191, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:38:21', '2023-12-26 02:38:21');
INSERT INTO `admin_operation_log` VALUES (192, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:38:58', '2023-12-26 02:38:58');
INSERT INTO `admin_operation_log` VALUES (193, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:42:51', '2023-12-26 02:42:51');
INSERT INTO `admin_operation_log` VALUES (194, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:42:52', '2023-12-26 02:42:52');
INSERT INTO `admin_operation_log` VALUES (195, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:48:43', '2023-12-26 02:48:43');
INSERT INTO `admin_operation_log` VALUES (196, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:48:50', '2023-12-26 02:48:50');
INSERT INTO `admin_operation_log` VALUES (197, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:49:39', '2023-12-26 02:49:39');
INSERT INTO `admin_operation_log` VALUES (198, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:50:13', '2023-12-26 02:50:13');
INSERT INTO `admin_operation_log` VALUES (199, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:52:02', '2023-12-26 02:52:02');
INSERT INTO `admin_operation_log` VALUES (200, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:52:41', '2023-12-26 02:52:41');
INSERT INTO `admin_operation_log` VALUES (201, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:58:11', '2023-12-26 02:58:11');
INSERT INTO `admin_operation_log` VALUES (202, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:58:37', '2023-12-26 02:58:37');
INSERT INTO `admin_operation_log` VALUES (203, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:58:49', '2023-12-26 02:58:49');
INSERT INTO `admin_operation_log` VALUES (204, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:59:16', '2023-12-26 02:59:16');
INSERT INTO `admin_operation_log` VALUES (205, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:59:46', '2023-12-26 02:59:46');
INSERT INTO `admin_operation_log` VALUES (206, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 02:59:53', '2023-12-26 02:59:53');
INSERT INTO `admin_operation_log` VALUES (207, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 03:00:43', '2023-12-26 03:00:43');
INSERT INTO `admin_operation_log` VALUES (208, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_columns_\":\"cate_id,create_at,des,id,offer_link,offer_name,offer_price,offer_status\"}', '2023-12-26 03:00:44', '2023-12-26 03:00:44');
INSERT INTO `admin_operation_log` VALUES (209, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:01:06', '2023-12-26 03:01:06');
INSERT INTO `admin_operation_log` VALUES (210, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:01:09', '2023-12-26 03:01:09');
INSERT INTO `admin_operation_log` VALUES (211, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 03:01:17', '2023-12-26 03:01:17');
INSERT INTO `admin_operation_log` VALUES (212, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 03:01:52', '2023-12-26 03:01:52');
INSERT INTO `admin_operation_log` VALUES (213, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 03:06:15', '2023-12-26 03:06:15');
INSERT INTO `admin_operation_log` VALUES (214, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 03:06:16', '2023-12-26 03:06:16');
INSERT INTO `admin_operation_log` VALUES (215, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 03:06:25', '2023-12-26 03:06:25');
INSERT INTO `admin_operation_log` VALUES (216, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 03:09:14', '2023-12-26 03:09:14');
INSERT INTO `admin_operation_log` VALUES (217, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 03:09:31', '2023-12-26 03:09:31');
INSERT INTO `admin_operation_log` VALUES (218, 1, 'admin/offer/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:09:41', '2023-12-26 03:09:41');
INSERT INTO `admin_operation_log` VALUES (219, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:10:19', '2023-12-26 03:10:19');
INSERT INTO `admin_operation_log` VALUES (220, 1, 'admin/offer/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:10:22', '2023-12-26 03:10:22');
INSERT INTO `admin_operation_log` VALUES (221, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:11:20', '2023-12-26 03:11:20');
INSERT INTO `admin_operation_log` VALUES (222, 1, 'admin/offer/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:11:24', '2023-12-26 03:11:24');
INSERT INTO `admin_operation_log` VALUES (223, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:11:32', '2023-12-26 03:11:32');
INSERT INTO `admin_operation_log` VALUES (224, 1, 'admin/offer/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:11:35', '2023-12-26 03:11:35');
INSERT INTO `admin_operation_log` VALUES (225, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:11:50', '2023-12-26 03:11:50');
INSERT INTO `admin_operation_log` VALUES (226, 1, 'admin/offer/2', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:11:54', '2023-12-26 03:11:54');
INSERT INTO `admin_operation_log` VALUES (227, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:11:57', '2023-12-26 03:11:57');
INSERT INTO `admin_operation_log` VALUES (228, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 03:18:30', '2023-12-26 03:18:30');
INSERT INTO `admin_operation_log` VALUES (229, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 03:19:00', '2023-12-26 03:19:00');
INSERT INTO `admin_operation_log` VALUES (230, 1, 'admin/offer/show', 'GET', '127.0.0.1', '[]', '2023-12-26 03:21:55', '2023-12-26 03:21:55');
INSERT INTO `admin_operation_log` VALUES (231, 1, 'admin/offer/show', 'GET', '127.0.0.1', '[]', '2023-12-26 03:22:17', '2023-12-26 03:22:17');
INSERT INTO `admin_operation_log` VALUES (232, 1, 'admin/offer/show', 'GET', '127.0.0.1', '[]', '2023-12-26 03:48:58', '2023-12-26 03:48:58');
INSERT INTO `admin_operation_log` VALUES (233, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 03:49:32', '2023-12-26 03:49:32');
INSERT INTO `admin_operation_log` VALUES (234, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:50:15', '2023-12-26 03:50:15');
INSERT INTO `admin_operation_log` VALUES (235, 1, 'admin/auth/menu', 'POST', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u4ea7\\u54c1\",\"icon\":\"fa-bars\",\"uri\":\"admin\\/product\",\"roles\":[null],\"permission\":null,\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\"}', '2023-12-26 03:50:51', '2023-12-26 03:50:51');
INSERT INTO `admin_operation_log` VALUES (236, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-26 03:50:51', '2023-12-26 03:50:51');
INSERT INTO `admin_operation_log` VALUES (237, 1, 'admin/auth/menu/9/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:50:58', '2023-12-26 03:50:58');
INSERT INTO `admin_operation_log` VALUES (238, 1, 'admin/auth/menu/9', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u4ea7\\u54c1\",\"icon\":\"fa-bars\",\"uri\":\"product\",\"roles\":[null],\"permission\":null,\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/auth\\/menu\"}', '2023-12-26 03:51:03', '2023-12-26 03:51:03');
INSERT INTO `admin_operation_log` VALUES (239, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-26 03:51:03', '2023-12-26 03:51:03');
INSERT INTO `admin_operation_log` VALUES (240, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-26 03:51:09', '2023-12-26 03:51:09');
INSERT INTO `admin_operation_log` VALUES (241, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:54:44', '2023-12-26 03:54:44');
INSERT INTO `admin_operation_log` VALUES (242, 1, 'admin/offer/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:54:47', '2023-12-26 03:54:47');
INSERT INTO `admin_operation_log` VALUES (243, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:56:48', '2023-12-26 03:56:48');
INSERT INTO `admin_operation_log` VALUES (244, 1, 'admin/auth/menu/9/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:56:51', '2023-12-26 03:56:51');
INSERT INTO `admin_operation_log` VALUES (245, 1, 'admin/auth/menu/9', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u4ea7\\u54c1\",\"icon\":\"fa-bars\",\"uri\":\"product\\/show\",\"roles\":[null],\"permission\":null,\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/auth\\/menu\"}', '2023-12-26 03:56:59', '2023-12-26 03:56:59');
INSERT INTO `admin_operation_log` VALUES (246, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-26 03:56:59', '2023-12-26 03:56:59');
INSERT INTO `admin_operation_log` VALUES (247, 1, 'admin/auth/menu/9/edit', 'GET', '127.0.0.1', '[]', '2023-12-26 03:58:03', '2023-12-26 03:58:03');
INSERT INTO `admin_operation_log` VALUES (248, 1, 'admin/auth/menu/9/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 03:59:05', '2023-12-26 03:59:05');
INSERT INTO `admin_operation_log` VALUES (249, 1, 'admin/auth/menu/9/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:00:45', '2023-12-26 04:00:45');
INSERT INTO `admin_operation_log` VALUES (250, 1, 'admin/auth/menu/9/edit', 'GET', '127.0.0.1', '[]', '2023-12-26 04:00:47', '2023-12-26 04:00:47');
INSERT INTO `admin_operation_log` VALUES (251, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 04:06:47', '2023-12-26 04:06:47');
INSERT INTO `admin_operation_log` VALUES (252, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 04:07:25', '2023-12-26 04:07:25');
INSERT INTO `admin_operation_log` VALUES (253, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:07:30', '2023-12-26 04:07:30');
INSERT INTO `admin_operation_log` VALUES (254, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-26 04:38:07', '2023-12-26 04:38:07');
INSERT INTO `admin_operation_log` VALUES (255, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:38:10', '2023-12-26 04:38:10');
INSERT INTO `admin_operation_log` VALUES (256, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-26 04:38:11', '2023-12-26 04:38:11');
INSERT INTO `admin_operation_log` VALUES (257, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:38:13', '2023-12-26 04:38:13');
INSERT INTO `admin_operation_log` VALUES (258, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-26 04:38:13', '2023-12-26 04:38:13');
INSERT INTO `admin_operation_log` VALUES (259, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:38:26', '2023-12-26 04:38:26');
INSERT INTO `admin_operation_log` VALUES (260, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:38:27', '2023-12-26 04:38:27');
INSERT INTO `admin_operation_log` VALUES (261, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 04:38:27', '2023-12-26 04:38:27');
INSERT INTO `admin_operation_log` VALUES (262, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:38:44', '2023-12-26 04:38:44');
INSERT INTO `admin_operation_log` VALUES (263, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:38:47', '2023-12-26 04:38:47');
INSERT INTO `admin_operation_log` VALUES (264, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:38:48', '2023-12-26 04:38:48');
INSERT INTO `admin_operation_log` VALUES (265, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:39:46', '2023-12-26 04:39:46');
INSERT INTO `admin_operation_log` VALUES (266, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:39:47', '2023-12-26 04:39:47');
INSERT INTO `admin_operation_log` VALUES (267, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:39:49', '2023-12-26 04:39:49');
INSERT INTO `admin_operation_log` VALUES (268, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 04:40:10', '2023-12-26 04:40:10');
INSERT INTO `admin_operation_log` VALUES (269, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 04:40:24', '2023-12-26 04:40:24');
INSERT INTO `admin_operation_log` VALUES (270, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-26 04:40:36', '2023-12-26 04:40:36');
INSERT INTO `admin_operation_log` VALUES (271, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:40:38', '2023-12-26 04:40:38');
INSERT INTO `admin_operation_log` VALUES (272, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 04:41:45', '2023-12-26 04:41:45');
INSERT INTO `admin_operation_log` VALUES (273, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 04:43:30', '2023-12-26 04:43:30');
INSERT INTO `admin_operation_log` VALUES (274, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 04:43:31', '2023-12-26 04:43:31');
INSERT INTO `admin_operation_log` VALUES (275, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:43:36', '2023-12-26 04:43:36');
INSERT INTO `admin_operation_log` VALUES (276, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 04:43:42', '2023-12-26 04:43:42');
INSERT INTO `admin_operation_log` VALUES (277, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:45:49', '2023-12-26 04:45:49');
INSERT INTO `admin_operation_log` VALUES (278, 1, 'admin/offer/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:45:52', '2023-12-26 04:45:52');
INSERT INTO `admin_operation_log` VALUES (279, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:46:06', '2023-12-26 04:46:06');
INSERT INTO `admin_operation_log` VALUES (280, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:46:08', '2023-12-26 04:46:08');
INSERT INTO `admin_operation_log` VALUES (281, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 04:46:21', '2023-12-26 04:46:21');
INSERT INTO `admin_operation_log` VALUES (282, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-26 04:59:01', '2023-12-26 04:59:01');
INSERT INTO `admin_operation_log` VALUES (283, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:59:04', '2023-12-26 04:59:04');
INSERT INTO `admin_operation_log` VALUES (284, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-26 04:59:04', '2023-12-26 04:59:04');
INSERT INTO `admin_operation_log` VALUES (285, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:59:06', '2023-12-26 04:59:06');
INSERT INTO `admin_operation_log` VALUES (286, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-26 04:59:06', '2023-12-26 04:59:06');
INSERT INTO `admin_operation_log` VALUES (287, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:59:08', '2023-12-26 04:59:08');
INSERT INTO `admin_operation_log` VALUES (288, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-26 04:59:09', '2023-12-26 04:59:09');
INSERT INTO `admin_operation_log` VALUES (289, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-26 04:59:49', '2023-12-26 04:59:49');
INSERT INTO `admin_operation_log` VALUES (290, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 04:59:51', '2023-12-26 04:59:51');
INSERT INTO `admin_operation_log` VALUES (291, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-26 04:59:52', '2023-12-26 04:59:52');
INSERT INTO `admin_operation_log` VALUES (292, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-26 05:02:29', '2023-12-26 05:02:29');
INSERT INTO `admin_operation_log` VALUES (293, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:02:31', '2023-12-26 05:02:31');
INSERT INTO `admin_operation_log` VALUES (294, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-26 05:02:32', '2023-12-26 05:02:32');
INSERT INTO `admin_operation_log` VALUES (295, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:02:36', '2023-12-26 05:02:36');
INSERT INTO `admin_operation_log` VALUES (296, 1, 'admin/auth/menu/9/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:02:41', '2023-12-26 05:02:41');
INSERT INTO `admin_operation_log` VALUES (297, 1, 'admin/auth/menu/9', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u4ea7\\u54c1\",\"icon\":\"fa-bars\",\"uri\":\"product\",\"roles\":[null],\"permission\":null,\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/auth\\/menu\"}', '2023-12-26 05:02:52', '2023-12-26 05:02:52');
INSERT INTO `admin_operation_log` VALUES (298, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-26 05:02:52', '2023-12-26 05:02:52');
INSERT INTO `admin_operation_log` VALUES (299, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-26 05:03:05', '2023-12-26 05:03:05');
INSERT INTO `admin_operation_log` VALUES (300, 1, 'admin/product', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:03:08', '2023-12-26 05:03:08');
INSERT INTO `admin_operation_log` VALUES (301, 1, 'admin/product', 'GET', '127.0.0.1', '[]', '2023-12-26 05:03:26', '2023-12-26 05:03:26');
INSERT INTO `admin_operation_log` VALUES (302, 1, 'admin/product/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:04:24', '2023-12-26 05:04:24');
INSERT INTO `admin_operation_log` VALUES (303, 1, 'admin/product', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:04:27', '2023-12-26 05:04:27');
INSERT INTO `admin_operation_log` VALUES (304, 1, 'admin/product', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\",\"_export_\":\"all\"}', '2023-12-26 05:12:10', '2023-12-26 05:12:10');
INSERT INTO `admin_operation_log` VALUES (305, 1, 'admin/product/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:12:30', '2023-12-26 05:12:30');
INSERT INTO `admin_operation_log` VALUES (306, 1, 'admin/product', 'GET', '127.0.0.1', '[]', '2023-12-26 05:12:31', '2023-12-26 05:12:31');
INSERT INTO `admin_operation_log` VALUES (307, 1, 'admin/product', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:12:56', '2023-12-26 05:12:56');
INSERT INTO `admin_operation_log` VALUES (308, 1, 'admin/product/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:12:59', '2023-12-26 05:12:59');
INSERT INTO `admin_operation_log` VALUES (309, 1, 'admin/product', 'GET', '127.0.0.1', '[]', '2023-12-26 05:12:59', '2023-12-26 05:12:59');
INSERT INTO `admin_operation_log` VALUES (310, 1, 'admin/product', 'GET', '127.0.0.1', '[]', '2023-12-26 05:13:29', '2023-12-26 05:13:29');
INSERT INTO `admin_operation_log` VALUES (311, 1, 'admin/product/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:13:34', '2023-12-26 05:13:34');
INSERT INTO `admin_operation_log` VALUES (312, 1, 'admin/product', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:14:02', '2023-12-26 05:14:02');
INSERT INTO `admin_operation_log` VALUES (313, 1, 'admin/product/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:14:15', '2023-12-26 05:14:15');
INSERT INTO `admin_operation_log` VALUES (314, 1, 'admin/product', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:14:17', '2023-12-26 05:14:17');
INSERT INTO `admin_operation_log` VALUES (315, 1, 'admin/product/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:14:19', '2023-12-26 05:14:19');
INSERT INTO `admin_operation_log` VALUES (316, 1, 'admin/product', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:14:23', '2023-12-26 05:14:23');
INSERT INTO `admin_operation_log` VALUES (317, 1, 'admin/product/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:19:02', '2023-12-26 05:19:02');
INSERT INTO `admin_operation_log` VALUES (318, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:19:52', '2023-12-26 05:19:52');
INSERT INTO `admin_operation_log` VALUES (319, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:20:25', '2023-12-26 05:20:25');
INSERT INTO `admin_operation_log` VALUES (320, 1, 'admin/auth/menu/9/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:20:27', '2023-12-26 05:20:27');
INSERT INTO `admin_operation_log` VALUES (321, 1, 'admin/auth/menu/9', 'PUT', '127.0.0.1', '{\"parent_id\":\"0\",\"title\":\"\\u4ea7\\u54c1\",\"icon\":\"fa-bars\",\"uri\":\"product\\/show\",\"roles\":[null],\"permission\":null,\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_method\":\"PUT\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/auth\\/menu\"}', '2023-12-26 05:20:32', '2023-12-26 05:20:32');
INSERT INTO `admin_operation_log` VALUES (322, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '[]', '2023-12-26 05:20:32', '2023-12-26 05:20:32');
INSERT INTO `admin_operation_log` VALUES (323, 1, 'admin/product', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:21:09', '2023-12-26 05:21:09');
INSERT INTO `admin_operation_log` VALUES (324, 1, 'admin/product', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:21:11', '2023-12-26 05:21:11');
INSERT INTO `admin_operation_log` VALUES (325, 1, 'admin/product', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:21:13', '2023-12-26 05:21:13');
INSERT INTO `admin_operation_log` VALUES (326, 1, 'admin/product', 'GET', '127.0.0.1', '[]', '2023-12-26 05:21:19', '2023-12-26 05:21:19');
INSERT INTO `admin_operation_log` VALUES (327, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:21:22', '2023-12-26 05:21:22');
INSERT INTO `admin_operation_log` VALUES (328, 1, 'admin/product', 'GET', '127.0.0.1', '[]', '2023-12-26 05:21:22', '2023-12-26 05:21:22');
INSERT INTO `admin_operation_log` VALUES (329, 1, 'admin/product', 'GET', '127.0.0.1', '[]', '2023-12-26 05:21:47', '2023-12-26 05:21:47');
INSERT INTO `admin_operation_log` VALUES (330, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:21:50', '2023-12-26 05:21:50');
INSERT INTO `admin_operation_log` VALUES (331, 1, 'admin/product', 'GET', '127.0.0.1', '[]', '2023-12-26 05:21:51', '2023-12-26 05:21:51');
INSERT INTO `admin_operation_log` VALUES (332, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:21:53', '2023-12-26 05:21:53');
INSERT INTO `admin_operation_log` VALUES (333, 1, 'admin/product', 'GET', '127.0.0.1', '[]', '2023-12-26 05:21:53', '2023-12-26 05:21:53');
INSERT INTO `admin_operation_log` VALUES (334, 1, 'admin/product', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:21:55', '2023-12-26 05:21:55');
INSERT INTO `admin_operation_log` VALUES (335, 1, 'admin/product', 'GET', '127.0.0.1', '[]', '2023-12-26 05:21:56', '2023-12-26 05:21:56');
INSERT INTO `admin_operation_log` VALUES (336, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:21:58', '2023-12-26 05:21:58');
INSERT INTO `admin_operation_log` VALUES (337, 1, 'admin/product', 'GET', '127.0.0.1', '[]', '2023-12-26 05:21:59', '2023-12-26 05:21:59');
INSERT INTO `admin_operation_log` VALUES (338, 1, 'admin/product', 'GET', '127.0.0.1', '[]', '2023-12-26 05:22:11', '2023-12-26 05:22:11');
INSERT INTO `admin_operation_log` VALUES (339, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:22:15', '2023-12-26 05:22:15');
INSERT INTO `admin_operation_log` VALUES (340, 1, 'admin/product', 'GET', '127.0.0.1', '[]', '2023-12-26 05:22:15', '2023-12-26 05:22:15');
INSERT INTO `admin_operation_log` VALUES (341, 1, 'admin/product', 'GET', '127.0.0.1', '[]', '2023-12-26 05:22:46', '2023-12-26 05:22:46');
INSERT INTO `admin_operation_log` VALUES (342, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:22:49', '2023-12-26 05:22:49');
INSERT INTO `admin_operation_log` VALUES (343, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:22:50', '2023-12-26 05:22:50');
INSERT INTO `admin_operation_log` VALUES (344, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 05:24:14', '2023-12-26 05:24:14');
INSERT INTO `admin_operation_log` VALUES (345, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 05:24:34', '2023-12-26 05:24:34');
INSERT INTO `admin_operation_log` VALUES (346, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 05:24:47', '2023-12-26 05:24:47');
INSERT INTO `admin_operation_log` VALUES (347, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 05:24:59', '2023-12-26 05:24:59');
INSERT INTO `admin_operation_log` VALUES (348, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 05:25:02', '2023-12-26 05:25:02');
INSERT INTO `admin_operation_log` VALUES (349, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 05:25:11', '2023-12-26 05:25:11');
INSERT INTO `admin_operation_log` VALUES (350, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 05:25:20', '2023-12-26 05:25:20');
INSERT INTO `admin_operation_log` VALUES (351, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 05:37:05', '2023-12-26 05:37:05');
INSERT INTO `admin_operation_log` VALUES (352, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 05:48:29', '2023-12-26 05:48:29');
INSERT INTO `admin_operation_log` VALUES (353, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 05:49:07', '2023-12-26 05:49:07');
INSERT INTO `admin_operation_log` VALUES (354, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 05:49:17', '2023-12-26 05:49:17');
INSERT INTO `admin_operation_log` VALUES (355, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 05:49:29', '2023-12-26 05:49:29');
INSERT INTO `admin_operation_log` VALUES (356, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 05:49:38', '2023-12-26 05:49:38');
INSERT INTO `admin_operation_log` VALUES (357, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 05:49:45', '2023-12-26 05:49:45');
INSERT INTO `admin_operation_log` VALUES (358, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 05:51:21', '2023-12-26 05:51:21');
INSERT INTO `admin_operation_log` VALUES (359, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 05:58:19', '2023-12-26 05:58:19');
INSERT INTO `admin_operation_log` VALUES (360, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 05:58:36', '2023-12-26 05:58:36');
INSERT INTO `admin_operation_log` VALUES (361, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:11:34', '2023-12-26 06:11:34');
INSERT INTO `admin_operation_log` VALUES (362, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:11:46', '2023-12-26 06:11:46');
INSERT INTO `admin_operation_log` VALUES (363, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:15:15', '2023-12-26 06:15:15');
INSERT INTO `admin_operation_log` VALUES (364, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:15:18', '2023-12-26 06:15:18');
INSERT INTO `admin_operation_log` VALUES (365, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:15:24', '2023-12-26 06:15:24');
INSERT INTO `admin_operation_log` VALUES (366, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:15:34', '2023-12-26 06:15:34');
INSERT INTO `admin_operation_log` VALUES (367, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:23:25', '2023-12-26 06:23:25');
INSERT INTO `admin_operation_log` VALUES (368, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:23:33', '2023-12-26 06:23:33');
INSERT INTO `admin_operation_log` VALUES (369, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:23:35', '2023-12-26 06:23:35');
INSERT INTO `admin_operation_log` VALUES (370, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:23:41', '2023-12-26 06:23:41');
INSERT INTO `admin_operation_log` VALUES (371, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:23:43', '2023-12-26 06:23:43');
INSERT INTO `admin_operation_log` VALUES (372, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:24:24', '2023-12-26 06:24:24');
INSERT INTO `admin_operation_log` VALUES (373, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 06:24:24', '2023-12-26 06:24:24');
INSERT INTO `admin_operation_log` VALUES (374, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:24:27', '2023-12-26 06:24:27');
INSERT INTO `admin_operation_log` VALUES (375, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 06:24:27', '2023-12-26 06:24:27');
INSERT INTO `admin_operation_log` VALUES (376, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 06:24:49', '2023-12-26 06:24:49');
INSERT INTO `admin_operation_log` VALUES (377, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:24:52', '2023-12-26 06:24:52');
INSERT INTO `admin_operation_log` VALUES (378, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 06:24:53', '2023-12-26 06:24:53');
INSERT INTO `admin_operation_log` VALUES (379, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:24:57', '2023-12-26 06:24:57');
INSERT INTO `admin_operation_log` VALUES (380, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 06:24:57', '2023-12-26 06:24:57');
INSERT INTO `admin_operation_log` VALUES (381, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:25:19', '2023-12-26 06:25:19');
INSERT INTO `admin_operation_log` VALUES (382, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:25:22', '2023-12-26 06:25:22');
INSERT INTO `admin_operation_log` VALUES (383, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 06:25:22', '2023-12-26 06:25:22');
INSERT INTO `admin_operation_log` VALUES (384, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-26 06:25:43', '2023-12-26 06:25:43');
INSERT INTO `admin_operation_log` VALUES (385, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:25:45', '2023-12-26 06:25:45');
INSERT INTO `admin_operation_log` VALUES (386, 1, 'admin/_handle_action_', 'POST', '127.0.0.1', '{\"_key\":\"1\",\"_model\":\"App_Models_Offer\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_action\":\"App_Admin_Actions_Post_Replicate\"}', '2023-12-26 06:25:49', '2023-12-26 06:25:49');
INSERT INTO `admin_operation_log` VALUES (387, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:25:49', '2023-12-26 06:25:49');
INSERT INTO `admin_operation_log` VALUES (388, 1, 'admin/_handle_action_', 'POST', '127.0.0.1', '{\"_key\":\"2\",\"_model\":\"App_Models_Offer\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_action\":\"App_Admin_Actions_Post_Replicate\"}', '2023-12-26 06:26:16', '2023-12-26 06:26:16');
INSERT INTO `admin_operation_log` VALUES (389, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:26:16', '2023-12-26 06:26:16');
INSERT INTO `admin_operation_log` VALUES (390, 1, 'admin/offer/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:26:22', '2023-12-26 06:26:22');
INSERT INTO `admin_operation_log` VALUES (391, 1, 'admin/offer', 'POST', '127.0.0.1', '{\"offer_name\":null,\"cate_id\":null,\"des\":null,\"offer_link\":null,\"offer_price\":null,\"offer_status\":\"on\",\"create_at\":\"2023-12-26 06:26:22\",\"update_at\":\"2023-12-26 06:26:22\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_previous_\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/offer\"}', '2023-12-26 06:26:24', '2023-12-26 06:26:24');
INSERT INTO `admin_operation_log` VALUES (392, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:26:24', '2023-12-26 06:26:24');
INSERT INTO `admin_operation_log` VALUES (393, 1, 'admin/_handle_action_', 'POST', '127.0.0.1', '{\"_key\":\"3\",\"_model\":\"App_Models_Offer\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_action\":\"Encore_Admin_Grid_Actions_Delete\",\"_input\":\"true\"}', '2023-12-26 06:26:28', '2023-12-26 06:26:28');
INSERT INTO `admin_operation_log` VALUES (394, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:26:29', '2023-12-26 06:26:29');
INSERT INTO `admin_operation_log` VALUES (395, 1, 'admin/offer/create', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:26:37', '2023-12-26 06:26:37');
INSERT INTO `admin_operation_log` VALUES (396, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:26:39', '2023-12-26 06:26:39');
INSERT INTO `admin_operation_log` VALUES (397, 1, 'admin/offer/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:26:48', '2023-12-26 06:26:48');
INSERT INTO `admin_operation_log` VALUES (398, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:26:49', '2023-12-26 06:26:49');
INSERT INTO `admin_operation_log` VALUES (399, 1, 'admin/_handle_action_', 'POST', '127.0.0.1', '{\"_key\":\"1\",\"_model\":\"App_Models_Offer\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_action\":\"App_Admin_Actions_Post_Replicate\"}', '2023-12-26 06:26:52', '2023-12-26 06:26:52');
INSERT INTO `admin_operation_log` VALUES (400, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:26:52', '2023-12-26 06:26:52');
INSERT INTO `admin_operation_log` VALUES (401, 1, 'admin/_handle_action_', 'POST', '127.0.0.1', '{\"_key\":\"1\",\"_model\":\"App_Models_Offer\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_action\":\"App_Admin_Actions_Post_Replicate\"}', '2023-12-26 06:27:59', '2023-12-26 06:27:59');
INSERT INTO `admin_operation_log` VALUES (402, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:27:59', '2023-12-26 06:27:59');
INSERT INTO `admin_operation_log` VALUES (403, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:28:06', '2023-12-26 06:28:06');
INSERT INTO `admin_operation_log` VALUES (404, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:28:08', '2023-12-26 06:28:08');
INSERT INTO `admin_operation_log` VALUES (405, 1, 'admin/_handle_action_', 'POST', '127.0.0.1', '{\"_key\":\"1\",\"_model\":\"App_Models_Offer\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_action\":\"App_Admin_Actions_Post_Replicate\"}', '2023-12-26 06:28:49', '2023-12-26 06:28:49');
INSERT INTO `admin_operation_log` VALUES (406, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:28:50', '2023-12-26 06:28:50');
INSERT INTO `admin_operation_log` VALUES (407, 1, 'admin/_handle_action_', 'POST', '127.0.0.1', '{\"_key\":\"1\",\"_model\":\"App_Models_Offer\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_action\":\"App_Admin_Actions_Post_Replicate\"}', '2023-12-26 06:34:57', '2023-12-26 06:34:57');
INSERT INTO `admin_operation_log` VALUES (408, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:34:57', '2023-12-26 06:34:57');
INSERT INTO `admin_operation_log` VALUES (409, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:37:09', '2023-12-26 06:37:09');
INSERT INTO `admin_operation_log` VALUES (410, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:37:14', '2023-12-26 06:37:14');
INSERT INTO `admin_operation_log` VALUES (411, 1, 'admin/_handle_action_', 'POST', '127.0.0.1', '{\"_key\":\"1\",\"_model\":\"App_Models_Offer\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_action\":\"App_Admin_Actions_Post_Replicate\"}', '2023-12-26 06:37:26', '2023-12-26 06:37:26');
INSERT INTO `admin_operation_log` VALUES (412, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:37:27', '2023-12-26 06:37:27');
INSERT INTO `admin_operation_log` VALUES (413, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:38:46', '2023-12-26 06:38:46');
INSERT INTO `admin_operation_log` VALUES (414, 1, 'admin/_handle_action_', 'POST', '127.0.0.1', '{\"_key\":\"1\",\"_model\":\"App_Models_Offer\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_action\":\"App_Admin_Actions_Post_Replicate\"}', '2023-12-26 06:38:49', '2023-12-26 06:38:49');
INSERT INTO `admin_operation_log` VALUES (415, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:38:49', '2023-12-26 06:38:49');
INSERT INTO `admin_operation_log` VALUES (416, 1, 'admin/_handle_action_', 'POST', '127.0.0.1', '{\"_key\":\"1\",\"_model\":\"App_Models_Offer\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_action\":\"App_Admin_Actions_Post_Replicate\"}', '2023-12-26 06:41:40', '2023-12-26 06:41:40');
INSERT INTO `admin_operation_log` VALUES (417, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:41:40', '2023-12-26 06:41:40');
INSERT INTO `admin_operation_log` VALUES (418, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:42:41', '2023-12-26 06:42:41');
INSERT INTO `admin_operation_log` VALUES (419, 1, 'admin/_handle_action_', 'POST', '127.0.0.1', '{\"_key\":\"1\",\"_model\":\"App_Models_Offer\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_action\":\"App_Admin_Actions_Post_Replicate\"}', '2023-12-26 06:42:44', '2023-12-26 06:42:44');
INSERT INTO `admin_operation_log` VALUES (420, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:42:44', '2023-12-26 06:42:44');
INSERT INTO `admin_operation_log` VALUES (421, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:42:47', '2023-12-26 06:42:47');
INSERT INTO `admin_operation_log` VALUES (422, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:46:54', '2023-12-26 06:46:54');
INSERT INTO `admin_operation_log` VALUES (423, 1, 'admin/_handle_action_', 'POST', '127.0.0.1', '{\"_key\":\"1\",\"_model\":\"App_Models_Offer\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_action\":\"App_Admin_Actions_Post_Replicate\",\"_input\":\"true\"}', '2023-12-26 06:47:00', '2023-12-26 06:47:00');
INSERT INTO `admin_operation_log` VALUES (424, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:47:00', '2023-12-26 06:47:00');
INSERT INTO `admin_operation_log` VALUES (425, 1, 'admin/offer/1', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:47:21', '2023-12-26 06:47:21');
INSERT INTO `admin_operation_log` VALUES (426, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:47:33', '2023-12-26 06:47:33');
INSERT INTO `admin_operation_log` VALUES (427, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:48:10', '2023-12-26 06:48:10');
INSERT INTO `admin_operation_log` VALUES (428, 1, 'admin/_handle_action_', 'POST', '127.0.0.1', '{\"_key\":\"1\",\"_model\":\"App_Models_Offer\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_action\":\"App_Admin_Actions_Post_Replicate\",\"_input\":\"true\"}', '2023-12-26 06:48:14', '2023-12-26 06:48:14');
INSERT INTO `admin_operation_log` VALUES (429, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:48:14', '2023-12-26 06:48:14');
INSERT INTO `admin_operation_log` VALUES (430, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2023-12-26 06:48:17', '2023-12-26 06:48:17');
INSERT INTO `admin_operation_log` VALUES (431, 1, 'admin/offer/1/edit', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:48:48', '2023-12-26 06:48:48');
INSERT INTO `admin_operation_log` VALUES (432, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:49:10', '2023-12-26 06:49:10');
INSERT INTO `admin_operation_log` VALUES (433, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:49:11', '2023-12-26 06:49:11');
INSERT INTO `admin_operation_log` VALUES (434, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:49:12', '2023-12-26 06:49:12');
INSERT INTO `admin_operation_log` VALUES (435, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:49:16', '2023-12-26 06:49:16');
INSERT INTO `admin_operation_log` VALUES (436, 1, 'admin/auth/permissions', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:49:20', '2023-12-26 06:49:20');
INSERT INTO `admin_operation_log` VALUES (437, 1, 'admin/auth/menu', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:49:24', '2023-12-26 06:49:24');
INSERT INTO `admin_operation_log` VALUES (438, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:49:35', '2023-12-26 06:49:35');
INSERT INTO `admin_operation_log` VALUES (439, 1, 'admin/_handle_action_', 'POST', '127.0.0.1', '{\"_key\":\"1\",\"_model\":\"App_Models_Offer\",\"_token\":\"KUfgPJOUuvGRegCPpYb2F8d4FX32Fau53ZW5jm5F\",\"_action\":\"App_Admin_Actions_Post_Replicate\",\"_input\":\"true\"}', '2023-12-26 06:50:02', '2023-12-26 06:50:02');
INSERT INTO `admin_operation_log` VALUES (440, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-26 06:50:02', '2023-12-26 06:50:02');
INSERT INTO `admin_operation_log` VALUES (441, 1, 'admin', 'GET', '127.0.0.1', '[]', '2023-12-29 06:16:41', '2023-12-29 06:16:41');
INSERT INTO `admin_operation_log` VALUES (442, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 06:16:45', '2023-12-29 06:16:45');
INSERT INTO `admin_operation_log` VALUES (443, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 06:16:49', '2023-12-29 06:16:49');
INSERT INTO `admin_operation_log` VALUES (444, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 06:19:47', '2023-12-29 06:19:47');
INSERT INTO `admin_operation_log` VALUES (445, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 06:19:50', '2023-12-29 06:19:50');
INSERT INTO `admin_operation_log` VALUES (446, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 06:19:50', '2023-12-29 06:19:50');
INSERT INTO `admin_operation_log` VALUES (447, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 06:20:14', '2023-12-29 06:20:14');
INSERT INTO `admin_operation_log` VALUES (448, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 06:20:17', '2023-12-29 06:20:17');
INSERT INTO `admin_operation_log` VALUES (449, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 06:21:07', '2023-12-29 06:21:07');
INSERT INTO `admin_operation_log` VALUES (450, 1, 'admin/auth/users', 'GET', '127.0.0.1', '[]', '2023-12-29 06:24:43', '2023-12-29 06:24:43');
INSERT INTO `admin_operation_log` VALUES (451, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 06:32:50', '2023-12-29 06:32:50');
INSERT INTO `admin_operation_log` VALUES (452, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 06:33:25', '2023-12-29 06:33:25');
INSERT INTO `admin_operation_log` VALUES (453, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 06:33:52', '2023-12-29 06:33:52');
INSERT INTO `admin_operation_log` VALUES (454, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 06:34:01', '2023-12-29 06:34:01');
INSERT INTO `admin_operation_log` VALUES (455, 1, 'admin/auth/setting', 'GET', '127.0.0.1', '[]', '2023-12-29 06:44:34', '2023-12-29 06:44:34');
INSERT INTO `admin_operation_log` VALUES (456, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 06:55:38', '2023-12-29 06:55:38');
INSERT INTO `admin_operation_log` VALUES (457, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 06:55:42', '2023-12-29 06:55:42');
INSERT INTO `admin_operation_log` VALUES (458, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 06:57:00', '2023-12-29 06:57:00');
INSERT INTO `admin_operation_log` VALUES (459, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 06:57:40', '2023-12-29 06:57:40');
INSERT INTO `admin_operation_log` VALUES (460, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 06:59:16', '2023-12-29 06:59:16');
INSERT INTO `admin_operation_log` VALUES (461, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 07:01:31', '2023-12-29 07:01:31');
INSERT INTO `admin_operation_log` VALUES (462, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 07:02:05', '2023-12-29 07:02:05');
INSERT INTO `admin_operation_log` VALUES (463, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 07:05:41', '2023-12-29 07:05:41');
INSERT INTO `admin_operation_log` VALUES (464, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 07:05:49', '2023-12-29 07:05:49');
INSERT INTO `admin_operation_log` VALUES (465, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 07:05:52', '2023-12-29 07:05:52');
INSERT INTO `admin_operation_log` VALUES (466, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 07:07:26', '2023-12-29 07:07:26');
INSERT INTO `admin_operation_log` VALUES (467, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 07:09:18', '2023-12-29 07:09:18');
INSERT INTO `admin_operation_log` VALUES (468, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 07:19:58', '2023-12-29 07:19:58');
INSERT INTO `admin_operation_log` VALUES (469, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 07:20:04', '2023-12-29 07:20:04');
INSERT INTO `admin_operation_log` VALUES (470, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 07:23:28', '2023-12-29 07:23:28');
INSERT INTO `admin_operation_log` VALUES (471, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 07:23:30', '2023-12-29 07:23:30');
INSERT INTO `admin_operation_log` VALUES (472, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 07:23:58', '2023-12-29 07:23:58');
INSERT INTO `admin_operation_log` VALUES (473, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 07:28:23', '2023-12-29 07:28:23');
INSERT INTO `admin_operation_log` VALUES (474, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 07:30:45', '2023-12-29 07:30:45');
INSERT INTO `admin_operation_log` VALUES (475, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:08:15', '2023-12-29 08:08:15');
INSERT INTO `admin_operation_log` VALUES (476, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 08:08:19', '2023-12-29 08:08:19');
INSERT INTO `admin_operation_log` VALUES (477, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 08:08:20', '2023-12-29 08:08:20');
INSERT INTO `admin_operation_log` VALUES (478, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:12:14', '2023-12-29 08:12:14');
INSERT INTO `admin_operation_log` VALUES (479, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:14:50', '2023-12-29 08:14:50');
INSERT INTO `admin_operation_log` VALUES (480, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:14:57', '2023-12-29 08:14:57');
INSERT INTO `admin_operation_log` VALUES (481, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:15:44', '2023-12-29 08:15:44');
INSERT INTO `admin_operation_log` VALUES (482, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:15:52', '2023-12-29 08:15:52');
INSERT INTO `admin_operation_log` VALUES (483, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:16:13', '2023-12-29 08:16:13');
INSERT INTO `admin_operation_log` VALUES (484, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 08:16:29', '2023-12-29 08:16:29');
INSERT INTO `admin_operation_log` VALUES (485, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 08:16:31', '2023-12-29 08:16:31');
INSERT INTO `admin_operation_log` VALUES (486, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:19:48', '2023-12-29 08:19:48');
INSERT INTO `admin_operation_log` VALUES (487, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 08:24:46', '2023-12-29 08:24:46');
INSERT INTO `admin_operation_log` VALUES (488, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2023-12-29 08:24:49', '2023-12-29 08:24:49');
INSERT INTO `admin_operation_log` VALUES (489, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:45:13', '2023-12-29 08:45:13');
INSERT INTO `admin_operation_log` VALUES (490, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:45:37', '2023-12-29 08:45:37');
INSERT INTO `admin_operation_log` VALUES (491, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:46:38', '2023-12-29 08:46:38');
INSERT INTO `admin_operation_log` VALUES (492, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:47:13', '2023-12-29 08:47:13');
INSERT INTO `admin_operation_log` VALUES (493, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:48:03', '2023-12-29 08:48:03');
INSERT INTO `admin_operation_log` VALUES (494, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:50:46', '2023-12-29 08:50:46');
INSERT INTO `admin_operation_log` VALUES (495, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:50:47', '2023-12-29 08:50:47');
INSERT INTO `admin_operation_log` VALUES (496, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:52:04', '2023-12-29 08:52:04');
INSERT INTO `admin_operation_log` VALUES (497, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:52:17', '2023-12-29 08:52:17');
INSERT INTO `admin_operation_log` VALUES (498, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:52:38', '2023-12-29 08:52:38');
INSERT INTO `admin_operation_log` VALUES (499, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:53:50', '2023-12-29 08:53:50');
INSERT INTO `admin_operation_log` VALUES (500, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:53:57', '2023-12-29 08:53:57');
INSERT INTO `admin_operation_log` VALUES (501, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:54:29', '2023-12-29 08:54:29');
INSERT INTO `admin_operation_log` VALUES (502, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:55:23', '2023-12-29 08:55:23');
INSERT INTO `admin_operation_log` VALUES (503, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:55:52', '2023-12-29 08:55:52');
INSERT INTO `admin_operation_log` VALUES (504, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:56:01', '2023-12-29 08:56:01');
INSERT INTO `admin_operation_log` VALUES (505, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:57:15', '2023-12-29 08:57:15');
INSERT INTO `admin_operation_log` VALUES (506, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:57:26', '2023-12-29 08:57:26');
INSERT INTO `admin_operation_log` VALUES (507, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:57:34', '2023-12-29 08:57:34');
INSERT INTO `admin_operation_log` VALUES (508, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:57:49', '2023-12-29 08:57:49');
INSERT INTO `admin_operation_log` VALUES (509, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:59:03', '2023-12-29 08:59:03');
INSERT INTO `admin_operation_log` VALUES (510, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 08:59:54', '2023-12-29 08:59:54');
INSERT INTO `admin_operation_log` VALUES (511, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 09:01:16', '2023-12-29 09:01:16');
INSERT INTO `admin_operation_log` VALUES (512, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 09:01:35', '2023-12-29 09:01:35');
INSERT INTO `admin_operation_log` VALUES (513, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 09:01:44', '2023-12-29 09:01:44');
INSERT INTO `admin_operation_log` VALUES (514, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 09:01:57', '2023-12-29 09:01:57');
INSERT INTO `admin_operation_log` VALUES (515, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 09:02:03', '2023-12-29 09:02:03');
INSERT INTO `admin_operation_log` VALUES (516, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2023-12-29 09:17:21', '2023-12-29 09:17:21');
INSERT INTO `admin_operation_log` VALUES (517, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 01:11:26', '2024-01-02 01:11:26');
INSERT INTO `admin_operation_log` VALUES (518, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 01:11:30', '2024-01-02 01:11:30');
INSERT INTO `admin_operation_log` VALUES (519, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 01:12:17', '2024-01-02 01:12:17');
INSERT INTO `admin_operation_log` VALUES (520, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 01:12:19', '2024-01-02 01:12:19');
INSERT INTO `admin_operation_log` VALUES (521, 1, 'admin', 'GET', '127.0.0.1', '[]', '2024-01-02 03:33:25', '2024-01-02 03:33:25');
INSERT INTO `admin_operation_log` VALUES (522, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 03:33:30', '2024-01-02 03:33:30');
INSERT INTO `admin_operation_log` VALUES (523, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 03:33:37', '2024-01-02 03:33:37');
INSERT INTO `admin_operation_log` VALUES (524, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 03:33:38', '2024-01-02 03:33:38');
INSERT INTO `admin_operation_log` VALUES (525, 1, 'admin/auth/users', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 03:38:36', '2024-01-02 03:38:36');
INSERT INTO `admin_operation_log` VALUES (526, 1, 'admin/auth/roles', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 03:38:38', '2024-01-02 03:38:38');
INSERT INTO `admin_operation_log` VALUES (527, 1, 'admin/product', 'GET', '127.0.0.1', '[]', '2024-01-02 06:48:17', '2024-01-02 06:48:17');
INSERT INTO `admin_operation_log` VALUES (528, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 06:48:21', '2024-01-02 06:48:21');
INSERT INTO `admin_operation_log` VALUES (529, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 06:48:55', '2024-01-02 06:48:55');
INSERT INTO `admin_operation_log` VALUES (530, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 06:48:57', '2024-01-02 06:48:57');
INSERT INTO `admin_operation_log` VALUES (531, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 06:50:53', '2024-01-02 06:50:53');
INSERT INTO `admin_operation_log` VALUES (532, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 06:51:03', '2024-01-02 06:51:03');
INSERT INTO `admin_operation_log` VALUES (533, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 06:52:13', '2024-01-02 06:52:13');
INSERT INTO `admin_operation_log` VALUES (534, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 06:52:28', '2024-01-02 06:52:28');
INSERT INTO `admin_operation_log` VALUES (535, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 06:53:16', '2024-01-02 06:53:16');
INSERT INTO `admin_operation_log` VALUES (536, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 06:55:25', '2024-01-02 06:55:25');
INSERT INTO `admin_operation_log` VALUES (537, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 06:55:31', '2024-01-02 06:55:31');
INSERT INTO `admin_operation_log` VALUES (538, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 06:56:48', '2024-01-02 06:56:48');
INSERT INTO `admin_operation_log` VALUES (539, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 06:57:21', '2024-01-02 06:57:21');
INSERT INTO `admin_operation_log` VALUES (540, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 06:57:48', '2024-01-02 06:57:48');
INSERT INTO `admin_operation_log` VALUES (541, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 06:59:37', '2024-01-02 06:59:37');
INSERT INTO `admin_operation_log` VALUES (542, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 07:01:06', '2024-01-02 07:01:06');
INSERT INTO `admin_operation_log` VALUES (543, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 07:01:18', '2024-01-02 07:01:18');
INSERT INTO `admin_operation_log` VALUES (544, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 07:01:23', '2024-01-02 07:01:23');
INSERT INTO `admin_operation_log` VALUES (545, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 07:01:30', '2024-01-02 07:01:30');
INSERT INTO `admin_operation_log` VALUES (546, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 07:01:38', '2024-01-02 07:01:38');
INSERT INTO `admin_operation_log` VALUES (547, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 07:01:52', '2024-01-02 07:01:52');
INSERT INTO `admin_operation_log` VALUES (548, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 07:02:03', '2024-01-02 07:02:03');
INSERT INTO `admin_operation_log` VALUES (549, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 07:02:22', '2024-01-02 07:02:22');
INSERT INTO `admin_operation_log` VALUES (550, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 07:31:28', '2024-01-02 07:31:28');
INSERT INTO `admin_operation_log` VALUES (551, 1, 'admin', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 07:31:31', '2024-01-02 07:31:31');
INSERT INTO `admin_operation_log` VALUES (552, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 07:31:32', '2024-01-02 07:31:32');
INSERT INTO `admin_operation_log` VALUES (553, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 07:49:35', '2024-01-02 07:49:35');
INSERT INTO `admin_operation_log` VALUES (554, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 07:55:03', '2024-01-02 07:55:03');
INSERT INTO `admin_operation_log` VALUES (555, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:14:36', '2024-01-02 08:14:36');
INSERT INTO `admin_operation_log` VALUES (556, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:14:36', '2024-01-02 08:14:36');
INSERT INTO `admin_operation_log` VALUES (557, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:15:08', '2024-01-02 08:15:08');
INSERT INTO `admin_operation_log` VALUES (558, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:15:08', '2024-01-02 08:15:08');
INSERT INTO `admin_operation_log` VALUES (559, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:15:46', '2024-01-02 08:15:46');
INSERT INTO `admin_operation_log` VALUES (560, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:15:47', '2024-01-02 08:15:47');
INSERT INTO `admin_operation_log` VALUES (561, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:16:20', '2024-01-02 08:16:20');
INSERT INTO `admin_operation_log` VALUES (562, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:16:20', '2024-01-02 08:16:20');
INSERT INTO `admin_operation_log` VALUES (563, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:17:13', '2024-01-02 08:17:13');
INSERT INTO `admin_operation_log` VALUES (564, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:17:13', '2024-01-02 08:17:13');
INSERT INTO `admin_operation_log` VALUES (565, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:18:42', '2024-01-02 08:18:42');
INSERT INTO `admin_operation_log` VALUES (566, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:19:14', '2024-01-02 08:19:14');
INSERT INTO `admin_operation_log` VALUES (567, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:19:14', '2024-01-02 08:19:14');
INSERT INTO `admin_operation_log` VALUES (568, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:27:41', '2024-01-02 08:27:41');
INSERT INTO `admin_operation_log` VALUES (569, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:27:50', '2024-01-02 08:27:50');
INSERT INTO `admin_operation_log` VALUES (570, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:31:23', '2024-01-02 08:31:23');
INSERT INTO `admin_operation_log` VALUES (571, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:31:24', '2024-01-02 08:31:24');
INSERT INTO `admin_operation_log` VALUES (572, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 08:47:27', '2024-01-02 08:47:27');
INSERT INTO `admin_operation_log` VALUES (573, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 08:47:28', '2024-01-02 08:47:28');
INSERT INTO `admin_operation_log` VALUES (574, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:47:29', '2024-01-02 08:47:29');
INSERT INTO `admin_operation_log` VALUES (575, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:48:24', '2024-01-02 08:48:24');
INSERT INTO `admin_operation_log` VALUES (576, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:48:24', '2024-01-02 08:48:24');
INSERT INTO `admin_operation_log` VALUES (577, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:48:32', '2024-01-02 08:48:32');
INSERT INTO `admin_operation_log` VALUES (578, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:48:32', '2024-01-02 08:48:32');
INSERT INTO `admin_operation_log` VALUES (579, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 08:48:37', '2024-01-02 08:48:37');
INSERT INTO `admin_operation_log` VALUES (580, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 08:48:37', '2024-01-02 08:48:37');
INSERT INTO `admin_operation_log` VALUES (581, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:48:38', '2024-01-02 08:48:38');
INSERT INTO `admin_operation_log` VALUES (582, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:48:47', '2024-01-02 08:48:47');
INSERT INTO `admin_operation_log` VALUES (583, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:48:48', '2024-01-02 08:48:48');
INSERT INTO `admin_operation_log` VALUES (584, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:49:46', '2024-01-02 08:49:46');
INSERT INTO `admin_operation_log` VALUES (585, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:49:46', '2024-01-02 08:49:46');
INSERT INTO `admin_operation_log` VALUES (586, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:49:58', '2024-01-02 08:49:58');
INSERT INTO `admin_operation_log` VALUES (587, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:49:58', '2024-01-02 08:49:58');
INSERT INTO `admin_operation_log` VALUES (588, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:50:11', '2024-01-02 08:50:11');
INSERT INTO `admin_operation_log` VALUES (589, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:50:11', '2024-01-02 08:50:11');
INSERT INTO `admin_operation_log` VALUES (590, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:52:05', '2024-01-02 08:52:05');
INSERT INTO `admin_operation_log` VALUES (591, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:52:05', '2024-01-02 08:52:05');
INSERT INTO `admin_operation_log` VALUES (592, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:52:32', '2024-01-02 08:52:32');
INSERT INTO `admin_operation_log` VALUES (593, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:52:32', '2024-01-02 08:52:32');
INSERT INTO `admin_operation_log` VALUES (594, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 08:53:49', '2024-01-02 08:53:49');
INSERT INTO `admin_operation_log` VALUES (595, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 08:53:50', '2024-01-02 08:53:50');
INSERT INTO `admin_operation_log` VALUES (596, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:01:43', '2024-01-02 09:01:43');
INSERT INTO `admin_operation_log` VALUES (597, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:01:43', '2024-01-02 09:01:43');
INSERT INTO `admin_operation_log` VALUES (598, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:02:00', '2024-01-02 09:02:00');
INSERT INTO `admin_operation_log` VALUES (599, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:02:00', '2024-01-02 09:02:00');
INSERT INTO `admin_operation_log` VALUES (600, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:05:53', '2024-01-02 09:05:53');
INSERT INTO `admin_operation_log` VALUES (601, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:05:53', '2024-01-02 09:05:53');
INSERT INTO `admin_operation_log` VALUES (602, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:07:01', '2024-01-02 09:07:01');
INSERT INTO `admin_operation_log` VALUES (603, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:07:01', '2024-01-02 09:07:01');
INSERT INTO `admin_operation_log` VALUES (604, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:07:52', '2024-01-02 09:07:52');
INSERT INTO `admin_operation_log` VALUES (605, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:07:52', '2024-01-02 09:07:52');
INSERT INTO `admin_operation_log` VALUES (606, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:08:09', '2024-01-02 09:08:09');
INSERT INTO `admin_operation_log` VALUES (607, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:08:09', '2024-01-02 09:08:09');
INSERT INTO `admin_operation_log` VALUES (608, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:09', '2024-01-02 09:09:09');
INSERT INTO `admin_operation_log` VALUES (609, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:09', '2024-01-02 09:09:09');
INSERT INTO `admin_operation_log` VALUES (610, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:38', '2024-01-02 09:09:38');
INSERT INTO `admin_operation_log` VALUES (611, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:38', '2024-01-02 09:09:38');
INSERT INTO `admin_operation_log` VALUES (612, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:51', '2024-01-02 09:09:51');
INSERT INTO `admin_operation_log` VALUES (613, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:09:51', '2024-01-02 09:09:51');
INSERT INTO `admin_operation_log` VALUES (614, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:10:16', '2024-01-02 09:10:16');
INSERT INTO `admin_operation_log` VALUES (615, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:10:16', '2024-01-02 09:10:16');
INSERT INTO `admin_operation_log` VALUES (616, 1, 'admin/offer', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 09:10:24', '2024-01-02 09:10:24');
INSERT INTO `admin_operation_log` VALUES (617, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-02 09:10:24', '2024-01-02 09:10:24');
INSERT INTO `admin_operation_log` VALUES (618, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:10:25', '2024-01-02 09:10:25');
INSERT INTO `admin_operation_log` VALUES (619, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:11:22', '2024-01-02 09:11:22');
INSERT INTO `admin_operation_log` VALUES (620, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:11:23', '2024-01-02 09:11:23');
INSERT INTO `admin_operation_log` VALUES (621, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:36:13', '2024-01-02 09:36:13');
INSERT INTO `admin_operation_log` VALUES (622, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:36:13', '2024-01-02 09:36:13');
INSERT INTO `admin_operation_log` VALUES (623, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:36:23', '2024-01-02 09:36:23');
INSERT INTO `admin_operation_log` VALUES (624, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:36:23', '2024-01-02 09:36:23');
INSERT INTO `admin_operation_log` VALUES (625, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:36:29', '2024-01-02 09:36:29');
INSERT INTO `admin_operation_log` VALUES (626, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:36:30', '2024-01-02 09:36:30');
INSERT INTO `admin_operation_log` VALUES (627, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:36:38', '2024-01-02 09:36:38');
INSERT INTO `admin_operation_log` VALUES (628, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:36:38', '2024-01-02 09:36:38');
INSERT INTO `admin_operation_log` VALUES (629, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:36:49', '2024-01-02 09:36:49');
INSERT INTO `admin_operation_log` VALUES (630, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:36:49', '2024-01-02 09:36:49');
INSERT INTO `admin_operation_log` VALUES (631, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:37:07', '2024-01-02 09:37:07');
INSERT INTO `admin_operation_log` VALUES (632, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:37:08', '2024-01-02 09:37:08');
INSERT INTO `admin_operation_log` VALUES (633, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:37:22', '2024-01-02 09:37:22');
INSERT INTO `admin_operation_log` VALUES (634, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:37:23', '2024-01-02 09:37:23');
INSERT INTO `admin_operation_log` VALUES (635, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:37:29', '2024-01-02 09:37:29');
INSERT INTO `admin_operation_log` VALUES (636, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:37:29', '2024-01-02 09:37:29');
INSERT INTO `admin_operation_log` VALUES (637, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:37:38', '2024-01-02 09:37:38');
INSERT INTO `admin_operation_log` VALUES (638, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:38:42', '2024-01-02 09:38:42');
INSERT INTO `admin_operation_log` VALUES (639, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:38:42', '2024-01-02 09:38:42');
INSERT INTO `admin_operation_log` VALUES (640, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:45:47', '2024-01-02 09:45:47');
INSERT INTO `admin_operation_log` VALUES (641, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:45:56', '2024-01-02 09:45:56');
INSERT INTO `admin_operation_log` VALUES (642, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:45:57', '2024-01-02 09:45:57');
INSERT INTO `admin_operation_log` VALUES (643, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:47:12', '2024-01-02 09:47:12');
INSERT INTO `admin_operation_log` VALUES (644, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:47:23', '2024-01-02 09:47:23');
INSERT INTO `admin_operation_log` VALUES (645, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:47:59', '2024-01-02 09:47:59');
INSERT INTO `admin_operation_log` VALUES (646, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:48:00', '2024-01-02 09:48:00');
INSERT INTO `admin_operation_log` VALUES (647, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:52:06', '2024-01-02 09:52:06');
INSERT INTO `admin_operation_log` VALUES (648, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:52:06', '2024-01-02 09:52:06');
INSERT INTO `admin_operation_log` VALUES (649, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:52:25', '2024-01-02 09:52:25');
INSERT INTO `admin_operation_log` VALUES (650, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:52:25', '2024-01-02 09:52:25');
INSERT INTO `admin_operation_log` VALUES (651, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 09:52:40', '2024-01-02 09:52:40');
INSERT INTO `admin_operation_log` VALUES (652, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 09:52:41', '2024-01-02 09:52:41');
INSERT INTO `admin_operation_log` VALUES (653, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:00:52', '2024-01-02 10:00:52');
INSERT INTO `admin_operation_log` VALUES (654, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:01:15', '2024-01-02 10:01:15');
INSERT INTO `admin_operation_log` VALUES (655, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:01:41', '2024-01-02 10:01:41');
INSERT INTO `admin_operation_log` VALUES (656, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 10:01:41', '2024-01-02 10:01:41');
INSERT INTO `admin_operation_log` VALUES (657, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:02:34', '2024-01-02 10:02:34');
INSERT INTO `admin_operation_log` VALUES (658, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:03:02', '2024-01-02 10:03:02');
INSERT INTO `admin_operation_log` VALUES (659, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:03:09', '2024-01-02 10:03:09');
INSERT INTO `admin_operation_log` VALUES (660, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 10:03:09', '2024-01-02 10:03:09');
INSERT INTO `admin_operation_log` VALUES (661, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:03:40', '2024-01-02 10:03:40');
INSERT INTO `admin_operation_log` VALUES (662, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 10:03:41', '2024-01-02 10:03:41');
INSERT INTO `admin_operation_log` VALUES (663, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:04:43', '2024-01-02 10:04:43');
INSERT INTO `admin_operation_log` VALUES (664, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:05:10', '2024-01-02 10:05:10');
INSERT INTO `admin_operation_log` VALUES (665, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 10:05:10', '2024-01-02 10:05:10');
INSERT INTO `admin_operation_log` VALUES (666, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:06:23', '2024-01-02 10:06:23');
INSERT INTO `admin_operation_log` VALUES (667, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:09:01', '2024-01-02 10:09:01');
INSERT INTO `admin_operation_log` VALUES (668, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:09:02', '2024-01-02 10:09:02');
INSERT INTO `admin_operation_log` VALUES (669, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:09:02', '2024-01-02 10:09:02');
INSERT INTO `admin_operation_log` VALUES (670, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:09:03', '2024-01-02 10:09:03');
INSERT INTO `admin_operation_log` VALUES (671, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:09:03', '2024-01-02 10:09:03');
INSERT INTO `admin_operation_log` VALUES (672, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:10:50', '2024-01-02 10:10:50');
INSERT INTO `admin_operation_log` VALUES (673, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 10:10:50', '2024-01-02 10:10:50');
INSERT INTO `admin_operation_log` VALUES (674, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:20:31', '2024-01-02 10:20:31');
INSERT INTO `admin_operation_log` VALUES (675, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 10:20:31', '2024-01-02 10:20:31');
INSERT INTO `admin_operation_log` VALUES (676, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-02 10:34:44', '2024-01-02 10:34:44');
INSERT INTO `admin_operation_log` VALUES (677, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-02 10:34:44', '2024-01-02 10:34:44');
INSERT INTO `admin_operation_log` VALUES (678, 1, 'admin', 'GET', '::1', '[]', '2024-01-03 05:21:13', '2024-01-03 05:21:13');
INSERT INTO `admin_operation_log` VALUES (679, 1, 'admin/product/show', 'GET', '::1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-03 05:21:17', '2024-01-03 05:21:17');
INSERT INTO `admin_operation_log` VALUES (680, 1, 'admin/product/u5', 'GET', '::1', '[]', '2024-01-03 05:21:17', '2024-01-03 05:21:17');
INSERT INTO `admin_operation_log` VALUES (681, 1, 'admin/product/show', 'GET', '::1', '[]', '2024-01-03 05:28:42', '2024-01-03 05:28:42');
INSERT INTO `admin_operation_log` VALUES (682, 1, 'admin/product/show', 'GET', '::1', '[]', '2024-01-03 05:30:29', '2024-01-03 05:30:29');
INSERT INTO `admin_operation_log` VALUES (683, 1, 'admin/product/u5', 'GET', '::1', '[]', '2024-01-03 05:30:29', '2024-01-03 05:30:29');
INSERT INTO `admin_operation_log` VALUES (684, 1, 'admin/product/show', 'GET', '::1', '[]', '2024-01-03 05:30:34', '2024-01-03 05:30:34');
INSERT INTO `admin_operation_log` VALUES (685, 1, 'admin/product/u5', 'GET', '::1', '[]', '2024-01-03 05:30:34', '2024-01-03 05:30:34');
INSERT INTO `admin_operation_log` VALUES (686, 1, 'admin/product/show', 'GET', '::1', '[]', '2024-01-03 05:32:42', '2024-01-03 05:32:42');
INSERT INTO `admin_operation_log` VALUES (687, 1, 'admin/product/u5', 'GET', '::1', '[]', '2024-01-03 05:32:42', '2024-01-03 05:32:42');
INSERT INTO `admin_operation_log` VALUES (688, 1, 'admin/product/show', 'GET', '::1', '[]', '2024-01-03 05:34:26', '2024-01-03 05:34:26');
INSERT INTO `admin_operation_log` VALUES (689, 1, 'admin/product/u5', 'GET', '::1', '[]', '2024-01-03 05:34:26', '2024-01-03 05:34:26');
INSERT INTO `admin_operation_log` VALUES (690, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2024-01-03 05:35:37', '2024-01-03 05:35:37');
INSERT INTO `admin_operation_log` VALUES (691, 1, 'admin/product/show', 'GET', '127.0.0.1', '{\"_pjax\":\"#pjax-container\"}', '2024-01-03 05:35:41', '2024-01-03 05:35:41');
INSERT INTO `admin_operation_log` VALUES (692, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-03 05:35:42', '2024-01-03 05:35:42');
INSERT INTO `admin_operation_log` VALUES (693, 1, 'admin/offer', 'GET', '127.0.0.1', '[]', '2024-01-03 05:40:21', '2024-01-03 05:40:21');
INSERT INTO `admin_operation_log` VALUES (694, 1, 'admin/product/show', 'GET', '127.0.0.1', '[]', '2024-01-03 06:24:13', '2024-01-03 06:24:13');
INSERT INTO `admin_operation_log` VALUES (695, 1, 'admin/product/u5', 'GET', '127.0.0.1', '[]', '2024-01-03 06:24:13', '2024-01-03 06:24:13');

-- ----------------------------
-- Table structure for admin_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_permissions`;
CREATE TABLE `admin_permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `http_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_permissions_name_unique`(`name`) USING BTREE,
  UNIQUE INDEX `admin_permissions_slug_unique`(`slug`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_permissions
-- ----------------------------
INSERT INTO `admin_permissions` VALUES (1, 'All permission', '*', '', '*', NULL, NULL);
INSERT INTO `admin_permissions` VALUES (2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL);
INSERT INTO `admin_permissions` VALUES (3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL);
INSERT INTO `admin_permissions` VALUES (4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL);
INSERT INTO `admin_permissions` VALUES (5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL);

-- ----------------------------
-- Table structure for admin_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_menu`;
CREATE TABLE `admin_role_menu`  (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  INDEX `admin_role_menu_role_id_menu_id_index`(`role_id`, `menu_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of admin_role_menu
-- ----------------------------
INSERT INTO `admin_role_menu` VALUES (1, 2, NULL, NULL);

-- ----------------------------
-- Table structure for admin_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permissions`;
CREATE TABLE `admin_role_permissions`  (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  INDEX `admin_role_permissions_role_id_permission_id_index`(`role_id`, `permission_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of admin_role_permissions
-- ----------------------------
INSERT INTO `admin_role_permissions` VALUES (1, 1, NULL, NULL);
INSERT INTO `admin_role_permissions` VALUES (2, 2, NULL, NULL);
INSERT INTO `admin_role_permissions` VALUES (2, 3, NULL, NULL);

-- ----------------------------
-- Table structure for admin_role_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_users`;
CREATE TABLE `admin_role_users`  (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  INDEX `admin_role_users_role_id_user_id_index`(`role_id`, `user_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of admin_role_users
-- ----------------------------
INSERT INTO `admin_role_users` VALUES (1, 1, NULL, NULL);

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `admin_roles_name_unique`(`name`) USING BTREE,
  UNIQUE INDEX `admin_roles_slug_unique`(`slug`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------
INSERT INTO `admin_roles` VALUES (1, 'Administrator', 'administrator', '2023-12-25 06:28:05', '2023-12-25 06:28:05');
INSERT INTO `admin_roles` VALUES (2, '44', '33', '2023-12-25 08:49:04', '2023-12-25 08:49:04');

-- ----------------------------
-- Table structure for admin_user_permissions
-- ----------------------------
DROP TABLE IF EXISTS `admin_user_permissions`;
CREATE TABLE `admin_user_permissions`  (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  INDEX `admin_user_permissions_user_id_permission_id_index`(`user_id`, `permission_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of admin_user_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `admin_users` VALUES (1, 'admin', '$2y$10$vowwjM0GiOIT.QWhgTT/P.cim5j9OS2vdD5TFtmcRrN.XM.gjg.H2', 'Administrator', NULL, '5x9RosMQgLo7fkWb3YYRUNxdohKl4SSw1rD5zG9MhPATP7Nu5WbYXtDic1NN', '2023-12-25 06:28:05', '2023-12-25 06:28:05');

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
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2016_01_04_173148_create_admin_tables', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
  `create_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `update_at` datetime NULL DEFAULT NULL COMMENT '更新时间',
  `updated_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '产品信息表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of offers
-- ----------------------------
INSERT INTO `offers` VALUES (1, '123', 2, '2222', '12222', 2222.00, 1, '2023-12-25 18:30:39', '2023-12-29 18:30:42', NULL, NULL);
INSERT INTO `offers` VALUES (2, '123', 1, '123', '12333', 123.00, 1, '2023-12-26 01:16:57', '2023-12-26 01:16:57', '2023-12-26 01:18:14', '2023-12-26 01:18:14');

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
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '产品名称',
  `cate_id` int(11) NULL DEFAULT NULL COMMENT '分类ID',
  `des` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '产品描述',
  `offer_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '产品链接',
  `offer_price` decimal(10, 2) NULL DEFAULT NULL COMMENT '产品价格',
  `offer_status` tinyint(2) NULL DEFAULT 1 COMMENT '状态1正常，2隐藏',
  `create_at` datetime NULL DEFAULT NULL COMMENT '创建时间',
  `update_at` datetime NULL DEFAULT NULL COMMENT '更新时间',
  `updated_at` datetime NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '产品信息表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, '123', 2, '2222', '12222', 2222.00, 1, '2023-12-25 18:30:39', '2023-12-29 18:30:42', NULL, NULL);
INSERT INTO `products` VALUES (2, '123444', 1, '123', '12333', 123.00, 1, '2023-12-26 01:16:57', '2023-12-26 01:16:57', '2023-12-26 01:18:14', '2023-12-26 01:18:14');

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
