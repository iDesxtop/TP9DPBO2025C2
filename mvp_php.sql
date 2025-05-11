/*
 Navicat Premium Data Transfer

 Source Server         : adsad
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : mvp_php

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 11/05/2025 17:03:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nim` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tempat` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tl` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telp` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES (1, '2202123', 'Abdullah', 'Garut', '2020-12-11', 'Laki-laki', 'abdul@upi.edu', '088970803025');
INSERT INTO `mahasiswa` VALUES (2, '2202124', 'Wahyu', 'Cimahi', '2020-12-14', 'Laki-laki', 'wah@upi.edu', '089678898545');
INSERT INTO `mahasiswa` VALUES (4, '2202125', 'Ayang', 'Bandung', '2020-11-29', 'Perempuan', 'ay@gmail.com', '081321778980');
INSERT INTO `mahasiswa` VALUES (5, '2202126', 'Rakha', 'Palembang', '2021-01-04', 'Laki-laki', 'palembang@gmail.com', '088970803025');
INSERT INTO `mahasiswa` VALUES (6, '2202127', 'Prilla', 'Seoul', '2001-05-05', 'Perempuan', 'prillarosaria@upi.edu', '081234876235');
INSERT INTO `mahasiswa` VALUES (7, '2202128', 'Son', 'Canada', '1994-02-21', 'Perempuan', 'chrstjsmn@gmail.com', '081573038425');
INSERT INTO `mahasiswa` VALUES (8, '2202129', 'Jeno', 'Incheon', '2000-12-23', 'Laki-laki', 'jeno@gmail.com', '08138746239');
INSERT INTO `mahasiswa` VALUES (9, '2202130', 'Mark', 'Canada', '1999-08-20', 'Laki-laki', 'mark@upi.edu', '08237218473');

SET FOREIGN_KEY_CHECKS = 1;
