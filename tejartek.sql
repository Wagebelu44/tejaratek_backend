/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tejartek

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-11-22 19:41:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for business
-- ----------------------------
DROP TABLE IF EXISTS `business`;
CREATE TABLE `business` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) DEFAULT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `cat` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `index_show` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of business
-- ----------------------------
INSERT INTO `business` VALUES ('6', 'موقع ويب 3', 'Card.png', 'https://www.youtube.com/', '4', '1', '1', null, '2020-08-12 15:27:10', '2020-08-13 07:41:57', '1');
INSERT INTO `business` VALUES ('7', 'موقع ويب 2', 'Card.png', 'https://www.youtube.com/', '4', '1', '1', null, '2020-08-12 15:27:10', '2020-08-13 07:36:30', '1');
INSERT INTO `business` VALUES ('8', 'موقع ويب 2', 'Card.png', 'https://www.youtube.com/', '4', '1', '1', null, '2020-11-20 22:08:09', '2020-11-20 22:08:27', '1');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `details` longtext NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `response` longtext,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `read_at` date DEFAULT NULL,
  `type` tinyint(4) DEFAULT '1',
  `name_project` varchar(250) DEFAULT NULL,
  `currency` tinyint(4) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of messages
-- ----------------------------
INSERT INTO `messages` VALUES ('1', 'رائد ياسر الحلاق', 'raedalhallaq97@gmail.com', '0594488606', 'تيسيت', null, 'نشكر لكم ثقتكم', null, '2020-04-08 10:49:22', '2020-04-08 10:58:54', null, '1', null, null, null);
INSERT INTO `messages` VALUES ('2', 'test', 'raedalhallaq97@gmail.com', '0594488606', 'test', null, null, null, '2020-04-08 11:05:26', '2020-04-08 11:05:26', null, '1', null, null, null);
INSERT INTO `messages` VALUES ('3', 'qqqq', 'qq@gmail.com', '0595926710', 'qqqqq', null, null, '2020-11-21 21:03:37', '2020-08-12 04:37:02', '2020-11-21 21:03:37', null, '1', null, null, null);
INSERT INTO `messages` VALUES ('4', 'جديد', 'moatasm.1111@gmail.com', '0595959595', 'جديد جديد', null, null, null, '2020-08-12 09:34:18', '2020-08-12 09:34:18', null, '1', null, null, null);
INSERT INTO `messages` VALUES ('5', 'admin', 'qq@gmail.com', '0147896321', 'ششش', null, null, null, '2020-08-12 09:34:55', '2020-08-12 09:34:55', null, '1', null, null, null);
INSERT INTO `messages` VALUES ('6', 'ضضضضضضضضض', 'moatasm.1997.1@gmail.com', 'ضض', 'ضص', null, null, null, '2020-08-12 09:35:23', '2020-11-20 22:38:07', '2020-11-20', '1', null, null, null);
INSERT INTO `messages` VALUES ('7', 'رائد الحلاق', 'raedalhallaq97@gmail.com', '0594488606', 'محتوى الرسالة', null, null, null, '2020-11-21 20:34:33', '2020-11-21 20:34:33', null, '1', null, null, null);
INSERT INTO `messages` VALUES ('8', 'رائد ياسر الحلاق', 'raedalhallaq97@gmail.com', null, 'تفاصيل المشروع', null, null, null, '2020-11-21 20:48:06', '2020-11-21 20:48:06', null, '2', 'اسم المشروع', '1', '50');
INSERT INTO `messages` VALUES ('9', 'سي', 'wwww@w.com', null, '2', null, null, null, '2020-11-21 20:49:26', '2020-11-21 20:49:26', null, '2', '2', '1', '50');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('17', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('18', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('19', '2020_01_29_114640_create_permission_tables', '1');
INSERT INTO `migrations` VALUES ('20', '2020_02_24_074905_create_settings_table', '1');
INSERT INTO `migrations` VALUES ('23', '2020_04_01_075458_create_postsimmages_table', '4');
INSERT INTO `migrations` VALUES ('35', '2020_04_08_102230_create_messages_table', '13');
INSERT INTO `migrations` VALUES ('39', '2020_04_13_143215_create_sliders_table', '14');
INSERT INTO `migrations` VALUES ('40', '2020_04_07_131205_create_social_table', '15');
INSERT INTO `migrations` VALUES ('41', '2020_04_02_100318_create_uploadscenter_table', '16');
INSERT INTO `migrations` VALUES ('42', '2020_04_05_194123_create_staticpage_table', '17');
INSERT INTO `migrations` VALUES ('43', '2020_08_11_192257_create_ourclients_table', '18');
INSERT INTO `migrations` VALUES ('44', '‏‏2020_04_05_194123_create_service_table', '19');
INSERT INTO `migrations` VALUES ('45', '2020_08_12_110942_create_serviceitems_table', '20');
INSERT INTO `migrations` VALUES ('46', '2020_08_12_132415_create_howwork_table', '21');
INSERT INTO `migrations` VALUES ('49', '2020_08_12_143226_create_business_table', '22');
INSERT INTO `migrations` VALUES ('50', '2020_08_13_083010_create_plan_table', '23');
INSERT INTO `migrations` VALUES ('51', '2020_08_13_090828_create_planitems_table', '24');
INSERT INTO `migrations` VALUES ('52', '2020_08_13_102316_create_participation_table', '25');

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------
INSERT INTO `model_has_permissions` VALUES ('1', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('1', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('2', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('2', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('3', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('3', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('4', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('4', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('5', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('5', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('6', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('6', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('7', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('7', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('8', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('8', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('9', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('9', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('10', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('10', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('11', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('11', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('12', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('12', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('13', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('13', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('14', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('14', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('15', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('15', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('16', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('16', 'App\\Models\\User', '4');
INSERT INTO `model_has_permissions` VALUES ('17', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('18', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('19', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('20', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('21', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('22', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('55', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('56', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('57', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('58', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('59', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('60', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('61', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('62', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('63', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('64', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('65', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('66', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('67', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('68', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('69', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('81', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('82', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('83', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('84', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('85', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('86', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('93', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('94', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('95', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('96', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('97', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('98', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('105', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('106', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('107', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('108', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('109', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('110', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('111', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('112', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('113', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('114', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('115', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('116', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('117', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('118', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('119', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('120', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('121', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('122', 'App\\Models\\User', '1');
INSERT INTO `model_has_permissions` VALUES ('123', 'App\\Models\\User', '1');

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------

-- ----------------------------
-- Table structure for ourclients
-- ----------------------------
DROP TABLE IF EXISTS `ourclients`;
CREATE TABLE `ourclients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) DEFAULT NULL,
  `image` varchar(191) NOT NULL,
  `url` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ourclients
-- ----------------------------
INSERT INTO `ourclients` VALUES ('1', 'عميل 1', 'pic_1597175904.png', null, '1', '1', null, '2020-08-11 19:58:24', '2020-08-11 19:58:27');
INSERT INTO `ourclients` VALUES ('2', 'عميل 2', 'pic_1597176007.png', null, '1', '1', null, '2020-08-11 20:00:07', '2020-08-11 20:00:07');
INSERT INTO `ourclients` VALUES ('3', 'عميل 3', 'pic_1597176022.png', 'https://www.youtube.com/', '1', '1', null, '2020-08-11 20:00:22', '2020-11-20 22:35:08');
INSERT INTO `ourclients` VALUES ('4', 'عميل 12', 'pic_1605911258.png', null, '1', '1', '2020-11-20 22:27:52', '2020-08-11 20:00:37', '2020-11-20 22:27:52');
INSERT INTO `ourclients` VALUES ('5', 'عميل 5', 'pic_1597176049.png', null, '1', '1', '2020-08-11 20:01:23', '2020-08-11 20:00:49', '2020-08-11 20:01:23');
INSERT INTO `ourclients` VALUES ('6', '3', 'pic_1605911286.png', null, '1', '1', '2020-11-20 22:28:11', '2020-11-20 22:28:06', '2020-11-20 22:28:11');
INSERT INTO `ourclients` VALUES ('7', '2', 'pic_1605911770.png', 'https://www.example.com', '1', '1', '2020-11-20 22:36:23', '2020-11-20 22:36:10', '2020-11-20 22:36:23');

-- ----------------------------
-- Table structure for participation
-- ----------------------------
DROP TABLE IF EXISTS `participation`;
CREATE TABLE `participation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) DEFAULT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `plan_id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of participation
-- ----------------------------
INSERT INTO `participation` VALUES ('1', 'معتصم', '0595926710', 'moatasm.1997.1@gmail.com', '3', '1', null, '2020-08-13 10:41:50', '2020-08-13 10:41:50');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'users', 'المستخدمين', 'web', '1', '1', null, null);
INSERT INTO `permissions` VALUES ('2', 'view_users', 'عرض', 'web', null, '1', null, null);
INSERT INTO `permissions` VALUES ('3', 'add_users', 'إضافة', 'web', null, '1', null, null);
INSERT INTO `permissions` VALUES ('4', 'update_users', 'تعديل', 'web', null, '1', null, null);
INSERT INTO `permissions` VALUES ('5', 'delete_users', 'حذف', 'web', null, '1', null, null);
INSERT INTO `permissions` VALUES ('6', 'change_password_user', 'تغيير كلمة المرور', 'web', null, '1', null, null);
INSERT INTO `permissions` VALUES ('7', 'change_status_users', 'تغيير الحالة', 'web', null, '1', null, null);
INSERT INTO `permissions` VALUES ('8', 'permission_users', 'الصلاحيات', 'web', null, '1', null, null);
INSERT INTO `permissions` VALUES ('9', 'setting', 'الإعدادات', 'web', '1', '2', null, null);
INSERT INTO `permissions` VALUES ('10', 'update_setting', 'تعديل', 'web', null, '2', null, null);
INSERT INTO `permissions` VALUES ('11', 'system_constants', 'ثوابت النظام', 'web', '1', '3', null, null);
INSERT INTO `permissions` VALUES ('12', 'view_system_constants', 'عرض', 'web', null, '3', null, null);
INSERT INTO `permissions` VALUES ('13', 'add_system_constants', 'إضافة', 'web', null, '3', null, null);
INSERT INTO `permissions` VALUES ('14', 'update_system_constants', 'تعديل', 'web', null, '3', null, null);
INSERT INTO `permissions` VALUES ('15', 'delete_system_constants', 'حذف', 'web', null, '3', null, null);
INSERT INTO `permissions` VALUES ('16', 'status_system_constants', 'تغيير الحالة', 'web', null, '3', null, null);
INSERT INTO `permissions` VALUES ('17', 'static_page', 'الصفحات الثابتة', 'web', '1', '4', null, null);
INSERT INTO `permissions` VALUES ('18', 'view_page', 'عرض', 'web', null, '4', null, null);
INSERT INTO `permissions` VALUES ('19', 'edit_page', 'تعديل', 'web', null, '4', null, null);
INSERT INTO `permissions` VALUES ('20', 'delete_page', 'حذف', 'web', null, '4', null, null);
INSERT INTO `permissions` VALUES ('21', 'add_page', 'إضافة', 'web', null, '4', null, null);
INSERT INTO `permissions` VALUES ('22', 'update_status_page', 'تغيير الحالة', 'web', null, '4', null, null);
INSERT INTO `permissions` VALUES ('55', 'social', 'روابط التواصل الاجتماعي', 'web', '1', '10', null, null);
INSERT INTO `permissions` VALUES ('56', 'view_social', 'عرض', 'web', null, '10', null, null);
INSERT INTO `permissions` VALUES ('57', 'add_social', 'اضافة', 'web', null, '10', null, null);
INSERT INTO `permissions` VALUES ('58', 'edit_social', 'تعديل', 'web', null, '10', null, null);
INSERT INTO `permissions` VALUES ('59', 'delete_social', 'حذف', 'web', null, '10', null, null);
INSERT INTO `permissions` VALUES ('60', 'status_social', 'تغيير الحالة', 'web', null, '10', null, null);
INSERT INTO `permissions` VALUES ('61', 'contact', 'اتصل بنا', 'web', '1', '11', null, null);
INSERT INTO `permissions` VALUES ('62', 'view_contact', 'عرض', 'web', null, '11', null, null);
INSERT INTO `permissions` VALUES ('63', 'reply_contact', 'رد', 'web', null, '11', null, null);
INSERT INTO `permissions` VALUES ('64', 'slider', 'السلايدر', 'web', '1', '12', null, null);
INSERT INTO `permissions` VALUES ('65', 'view_slider', 'عرض', 'web', null, '12', null, null);
INSERT INTO `permissions` VALUES ('66', 'add_slider', 'اضافة', 'web', null, '12', null, null);
INSERT INTO `permissions` VALUES ('67', 'update_slider', 'تعديل', 'web', null, '12', null, null);
INSERT INTO `permissions` VALUES ('68', 'change_status_slider', 'تغيير الحالة', 'web', null, '12', null, null);
INSERT INTO `permissions` VALUES ('69', 'delete_slider', 'حذف', 'web', null, '12', null, null);
INSERT INTO `permissions` VALUES ('81', 'static_service', 'خدماتنا', 'web', '1', '14', null, null);
INSERT INTO `permissions` VALUES ('82', 'view_service', 'عرض', 'web', null, '14', null, null);
INSERT INTO `permissions` VALUES ('83', 'edit_service', 'تعديل', 'web', null, '14', null, null);
INSERT INTO `permissions` VALUES ('84', 'delete_service', 'حذف', 'web', null, '14', null, null);
INSERT INTO `permissions` VALUES ('85', 'add_service', 'إضافة', 'web', null, '14', null, null);
INSERT INTO `permissions` VALUES ('86', 'update_status_service', 'تغيير الحالة', 'web', null, '14', null, null);
INSERT INTO `permissions` VALUES ('93', 'business', 'اعمالنا', 'web', '1', '16', null, null);
INSERT INTO `permissions` VALUES ('94', 'view_business', 'عرض', 'web', null, '16', null, null);
INSERT INTO `permissions` VALUES ('95', 'edit_business', 'تعديل', 'web', null, '16', null, null);
INSERT INTO `permissions` VALUES ('96', 'delete_business', 'حذف', 'web', null, '16', null, null);
INSERT INTO `permissions` VALUES ('97', 'add_business', 'إضافة', 'web', null, '16', null, null);
INSERT INTO `permissions` VALUES ('98', 'update_status_business', 'تغيير الحالة', 'web', null, '16', null, null);
INSERT INTO `permissions` VALUES ('105', 'static_participation', 'إشتراكات الباقات و العروض', 'web', '1', '18', null, null);
INSERT INTO `permissions` VALUES ('106', 'view_participation', 'عرض', 'web', null, '18', null, null);
INSERT INTO `permissions` VALUES ('107', 'our_clients', 'عملائنا', 'web', '1', '6', null, null);
INSERT INTO `permissions` VALUES ('108', 'add_our_clients', 'إضافة', 'web', null, '6', null, null);
INSERT INTO `permissions` VALUES ('109', 'edit_our_clients', 'تعديل', 'web', null, '6', null, null);
INSERT INTO `permissions` VALUES ('110', 'view_our_clients', 'عرض', 'web', null, '6', null, null);
INSERT INTO `permissions` VALUES ('111', 'delete_our_clients', 'حذف', 'web', null, '6', null, null);
INSERT INTO `permissions` VALUES ('112', 'update_status_our_clients', 'تغيير الحالة', 'web', null, '6', null, null);
INSERT INTO `permissions` VALUES ('113', 'products', 'منتجاتنا', 'web', '1', '19', null, null);
INSERT INTO `permissions` VALUES ('114', 'view_products', 'عرض', 'web', null, '19', null, null);
INSERT INTO `permissions` VALUES ('115', 'add_products', 'إضافة', 'web', null, '19', null, null);
INSERT INTO `permissions` VALUES ('116', 'edit_products', 'تعديل', 'web', null, '19', null, null);
INSERT INTO `permissions` VALUES ('117', 'update_status_products', 'تغيير الحالة', 'web', null, '19', null, null);
INSERT INTO `permissions` VALUES ('118', 'delete_products', 'حذف', 'web', null, '19', null, null);
INSERT INTO `permissions` VALUES ('119', 'statistics', 'الإحصائيات', 'web', '1', '20', null, null);
INSERT INTO `permissions` VALUES ('120', 'view_statistics', 'عرض', 'web', null, '20', null, null);
INSERT INTO `permissions` VALUES ('121', 'add_statistics', 'إضافة', 'web', null, '20', null, null);
INSERT INTO `permissions` VALUES ('122', 'edit_statistics', 'تعديل', 'web', null, '20', null, null);
INSERT INTO `permissions` VALUES ('123', 'delete_statistics', 'حذف', 'web', null, '20', null, null);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `details` text,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('6', 'product.svg', 'متجرك', 'نظام متكامل لبناء المتجر الخاص بك بكل سهولة', '1', '1', null, '2020-11-20 22:50:02', '2020-11-20 22:50:47');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for service
-- ----------------------------
DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `details` text,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service
-- ----------------------------
INSERT INTO `service` VALUES ('2', 'pic_1597228896.png', 'التصميم', 'نقدم خدمات التصميم الخاصة بتصميم مواقع الويب و تطبيقات الموبايل، نقدم خدمات التصميم الخاصة بتصميم مواقع الويب و تطبيقات الموبايل', '1', '1', null, '2020-08-12 10:41:36', '2020-08-12 10:41:36');
INSERT INTO `service` VALUES ('3', 'pic_1597228930.png', 'برمجة مواقع الويب', 'نقدم خدمات التصميم الخاصة بتصميم مواقع الويب و تطبيقات الموبايل، نقدم خدمات التصميم الخاصة بتصميم مواقع الويب و تطبيقات الموبايل', '1', '1', null, '2020-08-12 10:42:10', '2020-08-12 10:43:10');
INSERT INTO `service` VALUES ('4', 'pic_1597229063.png', 'استضافة', 'نقدم خدمات التصميم الخاصة بتصميم مواقع الويب و تطبيقات الموبايل، نقدم خدمات التصميم الخاصة بتصميم مواقع الويب و تطبيقات الموبايل', '1', '1', null, '2020-08-12 10:44:23', '2020-08-12 10:44:23');
INSERT INTO `service` VALUES ('5', 'pic_1597229101.png', 'البرمجة', '<p>نبني لك السكريبت الأفضل لنشاط موقعك، حيث الكفاءة ومجموعة واسعة من الخيارات التي تساعدكم على بناء موقع يواكب نجاحاتك، حيث نعمل دائما على معايير عالمية لننال شرف خدمتكم و نضمن لك نجاح سريع لموقعك.</p>', '1', '1', '2020-11-21 21:10:00', '2020-08-12 10:45:01', '2020-08-12 11:43:48');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(191) DEFAULT NULL,
  `description` varchar(191) DEFAULT NULL,
  `logo` varchar(191) NOT NULL,
  `mobile` int(15) NOT NULL,
  `email` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location` varchar(191) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'تجارتك', 'تجارتك شركة ...', 'img_logo1597172358.svg', '5050050', 'info@tejartek.com', '0', 'الرياض ، السعودية العربية', null, null, '2020-11-20 21:48:09');

-- ----------------------------
-- Table structure for slider
-- ----------------------------
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `details` longtext,
  `status` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slider
-- ----------------------------
INSERT INTO `slider` VALUES ('2', 'img_logo1597172358.svg', 'تجارتك', 'أكثر من 100 مشروع ناجح و مكتمل <br> بالإضافة الى العديد من المشاريع مستمرة', '1', '1', null, '2020-08-12 05:56:06', '2020-11-20 21:57:01');

-- ----------------------------
-- Table structure for social
-- ----------------------------
DROP TABLE IF EXISTS `social`;
CREATE TABLE `social` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(191) NOT NULL,
  `social` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of social
-- ----------------------------
INSERT INTO `social` VALUES ('1', 'https://www.behance.net/', 'fa-behance', '1', '1', '2020-08-11 17:40:53', '2020-08-11 17:42:37');
INSERT INTO `social` VALUES ('2', 'https://www.instagram.com/', 'fa-instagram', '1', '1', '2020-08-11 17:43:36', '2020-08-11 17:43:36');
INSERT INTO `social` VALUES ('3', 'https://twitter.com/', 'fa-twitter', '1', '1', '2020-08-11 17:44:20', '2020-08-11 17:44:20');
INSERT INTO `social` VALUES ('4', 'https://www.snapchat.com/', 'fa-snapchat-ghost', '1', '1', '2020-08-11 17:45:04', '2020-08-11 17:49:07');
INSERT INTO `social` VALUES ('5', 'https://ae.linkedin.com/', 'fa-linkedin-in', '1', '1', '2020-08-11 17:47:32', '2020-08-11 17:48:37');
INSERT INTO `social` VALUES ('6', 'https://www.youtube.com/', 'fa-youtube', '1', '1', '2020-08-11 17:47:53', '2020-08-11 17:48:22');

-- ----------------------------
-- Table structure for static_pages
-- ----------------------------
DROP TABLE IF EXISTS `static_pages`;
CREATE TABLE `static_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `photo` varchar(191) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `details` text,
  `slug` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `delete_flag` tinyint(4) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of static_pages
-- ----------------------------
INSERT INTO `static_pages` VALUES ('2', 'main-logo.svg', 'عن الشركة', 'أبيكما أن وقام وبدأت, لم أدوات للمجهود بلا. إذ لها الأول الستار, تحت وصغار مدينة عل. أي بحشد ليرتفع الساحلية أما, ليركز الهادي للأسطول ما هذا, أسابيع الروسية وتم عن. وفي مع شدّت فكان أدوات. سمّي تعداد ونستون هذا ما. به، بـ الخاصّة هيروشيما, وربع جندي الشهير الساحل. يكن لعدم الثانية عل, جديداً الخاطفة منشوريا بها تم, إذ جهة الأمم الجنوب. أي أما الحربية المعارك, قد وعلى الحربي، الأولية جعل. بحث إعادة قُدُماً ان, بحث أطراف استولت شموليةً ما. الغزو قبضتهم للسيطرة عدد أم. دون أي بالقصف العالم، للأسطول. مدن ثم للسيطرة سنغافورة, أفاق الاعتداء أخر ٣٠, لمّ أسيا غرّة، مع. هو ودول وجهان فقد, في الوراء وبالتحديد، غير. وألمّ وجهان به،, ان ربع حصدت وحزبه, أم جعل بشكل سابق الكونجرس. وضم يقوم الأولية شموليةً أن, أي ربع طرفاً الأرضية. ذلك بالفشل ونستون ابتدعها قد. لها قد مساعدة الحلفاء, واشتدّت الهزائم إلى كل. تم البلطيق الحيلولة دار, عن به، تُصب البرية والحلفاء. مشارف واشتدّت شبح كل, بتخصيص بل مما. الحرة بقيادة تم وصل. غزو احتار كل أسر, بـ هُزم النمسا الخاسر بعد, من مسرح ألمانيا البشريةً فعل. والجنوب ارتكبها وبالتحديد، فعل. الا مع قِبل أمدها جديداً. بوابة الضغوط أن ولم. قد لمّ مكثّفة دنكيرك. جهة وبعض شعار ان. حق نهاية تكاليف بريطانيا، ما, إلى أن النزاع الألماني. حرب غزوه أصقاع القوقازية تم, حتى كل ألماني بقيادة والكوري, بلا أجزاء مواقعها بل. عدد عقبت بالسيطرة عل. دول معقل لهذه أسابيع. أن وقد وباءت المجتمع, هجوم وبغطاء ذلك هو. تعديل فهرست خدماتها Dnet توفر شركة في مجال التقنية أبيكما أن وقام وبدأت, لم أدوات للمجهود بلا. إذ لها الأول الستار, تحت وصغار مدينة عل. أي بحشد ليرتفع الساحلية أما, ليركز الهادي للأسطول ما هذا, أسابيع الروسية وتم عن. وفي مع شدّت فكان أدوات. سمّي تعداد ونستون هذا ما. به، بـ الخاصّة هيروشيما, وربع جندي الشهير الساحل. يكن لعدم الثانية عل, جديداً الخاطفة منشوريا بها تم, إذ جهة الأمم الجنوب. أي أما الحربية المعارك, قد وعلى الحربي، الأولية جعل. بحث إعادة قُدُماً ان, بحث أطراف استولت شموليةً ما. الغزو قبضتهم للسيطرة عدد أم.', 'about', '1', '1', '1', null, '2020-08-11 19:03:16', '2020-08-12 13:05:20');
INSERT INTO `static_pages` VALUES ('3', null, 'عملاؤنا الكرام', '', 'clients', '1', '1', '1', null, '2020-08-11 19:15:03', '2020-08-12 13:01:00');
INSERT INTO `static_pages` VALUES ('6', null, 'خدماتنا', 'خدماتها في مجال التقنية تجارتك توفر شركة حيث تقدم العديد من الخدمات المميزة وبجودة عالية و تضمن الخدمات التالية', 'service', '1', '1', '1', null, '2020-08-12 07:34:47', '2020-08-12 12:58:40');
INSERT INTO `static_pages` VALUES ('7', 'pic_1605909694.png', 'تجارتك', '<p>تجارتك</p>', 'about', '1', '1', '1', null, '2020-08-12 07:45:32', '2020-11-20 22:01:34');
INSERT INTO `static_pages` VALUES ('9', null, 'أعمالنا', '<p>أعمالنا</p>', 'business', '1', '1', '1', null, '2020-08-12 13:06:30', '2020-08-12 13:06:36');
INSERT INTO `static_pages` VALUES ('11', null, 'الإنجازات', 'أكثر من <span class=\"text-success\">100</span> مشروع ناجح و مكتمل <br> بالإضافة الى العديد من المشاريع مستمرة', 'statistics', '1', '1', '1', null, null, null);
INSERT INTO `static_pages` VALUES ('12', '', 'منتجاتنا', 'و تشمل العديد من المنتجات', 'products', '1', '1', '1', null, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `static_pages` VALUES ('13', null, '', 'لنتحدث عن مشروعك الجديد و البدء به', 'request_projects', '1', '1', '1', null, null, null);
INSERT INTO `static_pages` VALUES ('14', null, 'هل لديك مشروع تحتاج !تحتاج\r\n', 'شاهد بعض أعمالنا الحديثة شاهد بعض أعمالنا الحديثة\r\n\r\n<br>  شاهد بعض أعمالنا الحديثة شاهد بعض أعمالنا الحديثة', 'project', '1', '1', '1', null, null, null);
INSERT INTO `static_pages` VALUES ('15', null, 'تواصل معنا', 'سنكون على بعد مكالمة هاتفیة أو برید إلكتروني أو حتى رسالة نصیة\r\n', 'contact', '1', '1', '1', null, null, null);

-- ----------------------------
-- Table structure for statistics
-- ----------------------------
DROP TABLE IF EXISTS `statistics`;
CREATE TABLE `statistics` (
  `name` varchar(191) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` tinyint(4) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of statistics
-- ----------------------------
INSERT INTO `statistics` VALUES ('زبون سعيد بالتعامل معنا', '32', '2020-01-01 09:07:21', '2020-11-20 23:04:14', null, '1', '1');
INSERT INTO `statistics` VALUES ('سطر برمجي', '81900', '2020-01-01 09:09:53', '2020-11-20 23:04:27', null, '1', '2');
INSERT INTO `statistics` VALUES ('جائزة', '31', '2020-01-01 09:10:20', '2020-11-20 23:04:08', null, '1', '3');

-- ----------------------------
-- Table structure for system_constants
-- ----------------------------
DROP TABLE IF EXISTS `system_constants`;
CREATE TABLE `system_constants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(191) DEFAULT NULL,
  `name_en` varchar(191) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `value2` varchar(300) DEFAULT NULL,
  `value3` int(11) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_constants
-- ----------------------------
INSERT INTO `system_constants` VALUES ('1', 'أقسام الأعمال', null, '1', 'category', null, 'system_constants', '5', '1', null, null, null, null, null);
INSERT INTO `system_constants` VALUES ('2', 'تصميم', null, '1', null, null, 'category', null, '1', null, '2020-08-12 14:42:13', '2020-08-12 14:42:13', null, '1');
INSERT INTO `system_constants` VALUES ('3', 'فيديو', null, '2', null, null, 'category', null, '1', null, '2020-08-12 14:42:27', '2020-08-12 14:42:27', null, '1');
INSERT INTO `system_constants` VALUES ('4', 'تصوير', null, '3', null, null, 'category', null, '1', null, '2020-08-12 14:42:39', '2020-08-12 14:42:39', null, '1');
INSERT INTO `system_constants` VALUES ('5', 'مواقع و تطبيقات', null, '4', null, null, 'category', null, '1', null, '2020-08-12 14:42:56', '2020-08-12 14:42:56', null, '1');
INSERT INTO `system_constants` VALUES ('6', 'العملة', null, null, 'currency', null, 'system_constants', '6', '1', null, null, null, null, null);
INSERT INTO `system_constants` VALUES ('72', 'ريال سعودي', null, '1', null, null, 'currency', '1', '1', null, null, null, null, null);
INSERT INTO `system_constants` VALUES ('73', 'دولار أمريكي', null, '2', null, null, 'currency', '2', '1', null, null, null, null, null);
INSERT INTO `system_constants` VALUES ('74', 'يورو أوروبي', null, '3', null, null, 'currency', '3', '1', null, null, null, null, null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) NOT NULL,
  `fullname` varchar(191) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `mobile` varchar(191) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'الأدمن', 'admin@admin.com', null, '$2y$10$zwdGB93RTLrc8ygtk/.dMOZ0csismZs14h459ZnlVypu6Rg6zQq3K', '05988888', '1', '1', null, '2020-02-02 10:00:34', '2020-02-02 10:00:34', null);
INSERT INTO `users` VALUES ('4', 'test2', 'رائد2', 'admin2@ad2min.com', null, '$2y$10$WcssGld9w1IShPp6/Kz26un8d/b94cqWBqp8J1GOmXvHAQiRxjsAG', '12059484848', '1', '1', null, '2020-03-29 14:23:33', '2020-03-29 14:24:12', '2020-03-29 14:24:12');
