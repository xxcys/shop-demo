/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : xxcy.shop

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 10/12/2021 20:17:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `cname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, '手办');
INSERT INTO `category` VALUES (2, '漫展');
INSERT INTO `category` VALUES (5, '文体');
INSERT INTO `category` VALUES (4, '徽章');
INSERT INTO `category` VALUES (6, '盲盒');
INSERT INTO `category` VALUES (7, '键盘');
INSERT INTO `category` VALUES (8, '电子周边');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '评论内容',
  `sid` int(11) NULL DEFAULT NULL COMMENT '商品id',
  `comment_autor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '评论昵称',
  `com_color` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '评论颜色',
  `com_size` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '评论尺寸',
  `com_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '评论时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES (1, '坐等尾款了(。-ω-)zzz', 1, 'xxcy', '14', '1', '1638790974');
INSERT INTO `comment` VALUES (2, '东西很好，孩子很喜欢', 6, 'xxcy', '5', '3', '1639037545');
INSERT INTO `comment` VALUES (3, '是究极无敌巨tm可爱的琪亚娜', 7, 'xxcy', '9', '4', '1639038255');
INSERT INTO `comment` VALUES (4, '大爱，下次还来', 2, 'xxcy', '2', '5', '1639038945');
INSERT INTO `comment` VALUES (5, 'bilibili干杯[]~(￣▽￣)~*', 5, 'xxcy', '4', '2', '1639039309');

-- ----------------------------
-- Table structure for details
-- ----------------------------
DROP TABLE IF EXISTS `details`;
CREATE TABLE `details`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
  `sid` int(11) NULL DEFAULT NULL COMMENT '商品id',
  `details_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '商品详情图',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of details
-- ----------------------------
INSERT INTO `details` VALUES (1, 1, '/uploads/details/20211207\\36593284b33e295f098106f9efa9916e.jpg');
INSERT INTO `details` VALUES (2, 1, '/uploads/details/20211207\\98cab8467b4625eadd6fa5524bbf4fa0.jpg');
INSERT INTO `details` VALUES (3, 1, '/uploads/details/20211207\\bb38a14dbf91aaeccb91ad75caa27786.jpg');
INSERT INTO `details` VALUES (4, 1, '/uploads/details/20211207\\456c81c98fa5d8084a24623f9fde6334.jpg');
INSERT INTO `details` VALUES (5, 1, '/uploads/details/20211207\\6f9060914ac002dd1b5ab1ff4d10ea23.jpg');
INSERT INTO `details` VALUES (6, 1, '/uploads/details/20211207\\30768e185c3d2a3ed4cc06b5dd729f2e.jpg');
INSERT INTO `details` VALUES (7, 1, '/uploads/details/20211207\\c64d2ca187c980fd985e8878cd3f2cfc.jpg');
INSERT INTO `details` VALUES (8, 1, '/uploads/details/20211207\\e46e9cc3e3a86d2062d66efe925657ea.png');
INSERT INTO `details` VALUES (9, 1, '/uploads/details/20211207\\4134bb935bd7e5b0d5e828c2d1bee1a8.jpg');
INSERT INTO `details` VALUES (10, 1, '/uploads/details/20211207\\43160018ae6e1c16284c3112c2cc0a04.png');
INSERT INTO `details` VALUES (11, 2, '/uploads/details/20211207\\cd7cf7aa30822cef4913061ce0f28b23.jpg');
INSERT INTO `details` VALUES (12, 2, '/uploads/details/20211207\\a4e2ef157d7fcc99dbf6f5a8487565e3.jpg');
INSERT INTO `details` VALUES (13, 5, '/uploads/details/20211207\\f461fe33eb8a19ad78193ea8e463597e.jpg');
INSERT INTO `details` VALUES (14, 5, '/uploads/details/20211207\\420cf1f7ae244e7e08faa7ba9e3ec52c.png');
INSERT INTO `details` VALUES (15, 6, '/uploads/details/20211207\\cc797ab8370d384a840bc106cd72eb32.jpg');
INSERT INTO `details` VALUES (16, 7, '/uploads/details/20211209\\ba0fbb40401355adc1d29e3049e8d472.jpg');
INSERT INTO `details` VALUES (17, 7, '/uploads/details/20211209\\0a6095b55a71825595f4b134f0263c7f.jpg');
INSERT INTO `details` VALUES (18, 7, '/uploads/details/20211209\\aa2f7f059660932a7a6f452681def93e.jpg');
INSERT INTO `details` VALUES (19, 7, '/uploads/details/20211209\\26fd2d40f2e267c292e18bcf6b4138d1.jpg');
INSERT INTO `details` VALUES (20, 7, '/uploads/details/20211209\\974180d294e0c3915938b796629be264.jpg');
INSERT INTO `details` VALUES (21, 7, '/uploads/details/20211209\\b8c471e777ad76f8f544b6552508427e.jpg');
INSERT INTO `details` VALUES (22, 7, '/uploads/details/20211209\\dfa6791c91c463a3d994c496951c6809.jpg');

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member`  (
  `mid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '会员id',
  `mname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '会员用户名',
  `mpassword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '会员密码',
  `mphone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '会员手机号',
  `maddress` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '会员地址',
  PRIMARY KEY (`mid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES (4, '123', 'e10adc3949ba59abbe56e057f20f883e', '1008611', '广东省茂名市');
INSERT INTO `member` VALUES (2, 'xxcy', 'e10adc3949ba59abbe56e057f20f883e', '1008611', '广东省广州市');
INSERT INTO `member` VALUES (5, 'xxcys', 'e10adc3949ba59abbe56e057f20f883e', '10000', '广东省广州市');
INSERT INTO `member` VALUES (6, '123456', 'e10adc3949ba59abbe56e057f20f883e', '15706663237', '上海市徐汇区');
INSERT INTO `member` VALUES (7, '1233', 'e10adc3949ba59abbe56e057f20f883e', '15706663237', '四川成都');
INSERT INTO `member` VALUES (8, 'xxcs', 'e10adc3949ba59abbe56e057f20f883e', '15706663237', NULL);

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
  `sid` int(11) NULL DEFAULT NULL COMMENT '商品id',
  `member` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '收货人',
  `mphone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '收货人手机',
  `maddress` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '收货地址',
  `status` int(11) NULL DEFAULT NULL COMMENT '发货状态，1为已发货，0为未收货',
  `join_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '加入时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES (1, 2, 'xxcy', '1008611', '广东省广州市', 1, '1639061500');
INSERT INTO `order` VALUES (2, 5, 'xxcy', '1008611', '广东省广州市', 1, '1639064216');
INSERT INTO `order` VALUES (3, 1, '123', '1008611', '广东省茂名市', 1, '1639125215');
INSERT INTO `order` VALUES (4, 7, '123', '1008611', '广东省茂名市', 1, '1639137228');
INSERT INTO `order` VALUES (5, 5, 'xxcy', '1008611', '广东省广州市', 0, '1639138007');
INSERT INTO `order` VALUES (6, 2, 'xxcy', '1008611', '广东省广州市', 1, '1639138232');

-- ----------------------------
-- Table structure for shop
-- ----------------------------
DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `shop_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商品名字',
  `shop_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商品简介',
  `shop_temp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商品图片',
  `shop_price` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商品价格',
  `shop_des` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商品简介',
  `shop_sales` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商品销售量',
  `cid` int(11) NULL DEFAULT NULL COMMENT '商品分类id',
  `sid` int(11) NULL DEFAULT NULL COMMENT '店铺id',
  `did` int(11) NULL DEFAULT NULL COMMENT '详情id',
  `shop_imgs` text CHARACTER SET utf8 COLLATE utf8_bin NULL COMMENT '商品多图',
  `shop_status` int(11) NULL DEFAULT NULL COMMENT '商品状态，1为上架，0为下架',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shop
-- ----------------------------
INSERT INTO `shop` VALUES (1, '【原神/定金】凝光·掩月天权Ver.1/7静态手办 Genshin', '【原神/定金】凝光·掩月天权Ver.1/7静态手办 Genshin', '/uploads/shoptemp/20211205\\764ac179b76f26f0b9f68bf58d5df194.jpg', '240', '全国包邮 【原神/定金】凝光·掩月天权Ver.1/7静态手办 Genshin', '1000', 1, 3, NULL, '[[\"\\/uploads\\/shopimg\\/20211205\\\\9daf99aabf20b7d07926e12593cef26c.jpg\"],[\"\\/uploads\\/shopimg\\/20211205\\\\c31690c55a71791e59d465abbc5e442c.jpg\"],[\"\\/uploads\\/shopimg\\/20211205\\\\a46c10ad8438742800f30fb696282336.jpg\"],[\"\\/uploads\\/shopimg\\/20211205\\\\70270551ad5a28e0f023c6a25177aca1.jpg\"],[\"\\/uploads\\/shopimg\\/20211205\\\\bab44945d2292c05492c6b6de4cdf373.jpg\"]]', 1);
INSERT INTO `shop` VALUES (2, '洛天依乐正绫南北组『橘子汽水』主题周边', '现货/洛天依乐正绫南北组『橘子汽水』主题周边', '/uploads/shoptemp/20211205\\5337f4188e5cf5f3dc748c24ab6226dc.jpg', '15', '现货/洛天依乐正绫南北组『橘子汽水』主题周边 双闪徽章 透卡 set', '6', 5, 11, NULL, '[[\"\\/uploads\\/shopimg\\/20211205\\\\65ddcda6d8d9d2877271e7660598254d.jpg\"],[\"\\/uploads\\/shopimg\\/20211205\\\\75c7977405b1af124d562cdba006900a.jpg\"],[\"\\/uploads\\/shopimg\\/20211205\\\\845a071984d87cf92877627ac2de6b18.jpg\"],[\"\\/uploads\\/shopimg\\/20211205\\\\6bccf6eadca90cd2a662a3d37f16d2d9.jpg\"],[\"\\/uploads\\/shopimg\\/20211205\\\\cdddf05600e26f8fc1d93d1bb854d4ac.jpg\"]]', 1);
INSERT INTO `shop` VALUES (5, 'bilibili哔哩哔哩2233系列MH5真无线蓝牙耳机周边现货', 'bilibili哔哩哔哩2233系列MH5真无线蓝牙耳机周边现货', '/uploads/shoptemp/20211207\\83c9e99e488f6552769216357968620d.jpg', '199', '正品保证 bilibili哔哩哔哩2233系列MH5真无线蓝牙耳机周边现货', '500+', 8, 9, NULL, '[[\"\\/uploads\\/shopimg\\/20211207\\\\afd55034d6f41a2366944b287a15dd73.jpg\"],[\"\\/uploads\\/shopimg\\/20211207\\\\a2b047baa7d3805e983c4ec059346be5.jpg\"],[\"\\/uploads\\/shopimg\\/20211207\\\\3679c5b8ce454e654a6fb56912d58e1f.jpg\"],[\"\\/uploads\\/shopimg\\/20211207\\\\576a44e86433dc06c7024c3d377eb116.jpg\"],[\"\\/uploads\\/shopimg\\/20211207\\\\1acc5e4d2d42435a0d151973d3542bb9.jpg\"]]', 1);
INSERT INTO `shop` VALUES (6, '买二赠一Lovelive挂件周边亚克力钥匙扣南小鸟穗乃果妮可手机挂饰', '买二赠一Lovelive挂件周边亚克力钥匙扣南小鸟穗乃果妮可手机挂饰', '/uploads/shoptemp/20211207\\bd1fc0d6f486beda9065d25bbb15437a.jpg', '12.8', '钥匙扣/小挂件  买二赠一Lovelive挂件周边亚克力钥匙扣南小鸟穗乃果妮可手机挂饰', '50', 4, 9, NULL, '[[\"\\/uploads\\/shopimg\\/20211207\\\\0666c0e34242b5966fdfedf4ad7cf472.jpg\"],[\"\\/uploads\\/shopimg\\/20211207\\\\45902cd2ac5a74cb3aef76a53299dd49.jpg\"],[\"\\/uploads\\/shopimg\\/20211207\\\\2ba84058e505343b1cc703595dbf4bc7.jpg\"],[\"\\/uploads\\/shopimg\\/20211207\\\\11184d014d20d5037bf6910b4321285a.jpg\"],[\"\\/uploads\\/shopimg\\/20211207\\\\df2f6ee306e23d2d50f42d0accadef21.jpg\"]]', 1);
INSERT INTO `shop` VALUES (7, '【米哈游/崩坏3】繁星圆舞曲女武神周边礼包布洛妮娅希儿 miHoYo', '【米哈游/崩坏3】繁星圆舞曲女武神周边礼包布洛妮娅希儿 miHoYo', '/uploads/shoptemp/20211207\\aecaac35435ce308cfd4ff1521f38698.jpg', '119', '其他实物 【米哈游/崩坏3】繁星圆舞曲女武神周边礼包布洛妮娅希儿 miHoYo', '300+', 8, 3, NULL, '[[\"\\/uploads\\/shopimg\\/20211207\\\\a7596bf0b5cd739642da64de63e81990.jpg\"],[\"\\/uploads\\/shopimg\\/20211207\\\\33e165b83c6112b1018b27d8d8866d0f.jpg\"],[\"\\/uploads\\/shopimg\\/20211207\\\\9907af17b26346c3231f188fe813bfc3.jpg\"],[\"\\/uploads\\/shopimg\\/20211207\\\\5f93024c807af4499f86e59da928152b.jpg\"]]', 0);

-- ----------------------------
-- Table structure for shop_color
-- ----------------------------
DROP TABLE IF EXISTS `shop_color`;
CREATE TABLE `shop_color`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '颜色id',
  `sid` int(11) NULL DEFAULT NULL COMMENT '商品id',
  `color_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '颜色名字',
  `price` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商品价格',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shop_color
-- ----------------------------
INSERT INTO `shop_color` VALUES (1, 2, '双闪徽章', '15');
INSERT INTO `shop_color` VALUES (2, 2, '透卡', '10');
INSERT INTO `shop_color` VALUES (3, 2, 'set', '20');
INSERT INTO `shop_color` VALUES (4, 5, '无线耳机-现货', '199');
INSERT INTO `shop_color` VALUES (5, 6, '格子裙果', '12.8');
INSERT INTO `shop_color` VALUES (6, 6, '格子裙鸟', '12.8');
INSERT INTO `shop_color` VALUES (7, 6, '格子裙海', '12.8');
INSERT INTO `shop_color` VALUES (8, 6, '其他请备注', '12.8');
INSERT INTO `shop_color` VALUES (9, 7, '琪亚娜礼盒', '119');
INSERT INTO `shop_color` VALUES (10, 7, '芽衣礼盒', '119');
INSERT INTO `shop_color` VALUES (11, 7, '布洛妮娅礼盒', '119');
INSERT INTO `shop_color` VALUES (12, 7, '希儿礼盒', '119');
INSERT INTO `shop_color` VALUES (13, 7, '幽兰黛尔礼盒', '119');
INSERT INTO `shop_color` VALUES (14, 1, '凝光', '240');

-- ----------------------------
-- Table structure for shop_size
-- ----------------------------
DROP TABLE IF EXISTS `shop_size`;
CREATE TABLE `shop_size`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '尺寸id',
  `sid` int(11) NULL DEFAULT NULL COMMENT '商品id',
  `size_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '尺寸名字',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shop_size
-- ----------------------------
INSERT INTO `shop_size` VALUES (1, 1, '（miHoYo X Apex）预定即赠特典挂画【特典预计12月中旬发出】');
INSERT INTO `shop_size` VALUES (2, 5, '2233拜年祭限定');
INSERT INTO `shop_size` VALUES (3, 6, '满三减一，送一个徽章和三个卡贴');
INSERT INTO `shop_size` VALUES (4, 7, '繁星圆舞曲周边礼盒');
INSERT INTO `shop_size` VALUES (5, 2, '橘子汽水');

-- ----------------------------
-- Table structure for store
-- ----------------------------
DROP TABLE IF EXISTS `store`;
CREATE TABLE `store`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '店铺id',
  `sname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '店铺名称',
  `shopimg` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '店铺logo',
  `store_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '店铺简介',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of store
-- ----------------------------
INSERT INTO `store` VALUES (3, '米哈游', '/uploads/image/20211205\\7f2e8a33bc1e776d6bb9fc46efa69833.jpg', '游戏动漫公司');
INSERT INTO `store` VALUES (4, '猫受屋', '/uploads/image/20211205\\4522fd6f56c6bb0410d2032ea632fa6b.jpeg', '手办销售');
INSERT INTO `store` VALUES (5, '寿屋', '/uploads/image/20211205\\8d4322096dafb4d32e109b613e2832de.png', '进行塑胶模型、人物模型等的企划、开发、制造、贩售的日本玩具公司');
INSERT INTO `store` VALUES (6, '万代', '/uploads/image/20211205\\e3dbe37966db051e95e89cf02122d34b.jpg', '娱乐、网络、动漫产品及其周边');
INSERT INTO `store` VALUES (8, '阿尔塔', '/uploads/image/20211205\\82df80305a82440fa13da2d8a4d01a0a.jpg', '日本手办公司ALTER');
INSERT INTO `store` VALUES (9, '其他', '/uploads/image/20211205\\3270ab94b2db5881fd603b7c2cde2978.jpg', '其他周边');
INSERT INTO `store` VALUES (11, '三五堂', '/uploads/image/20211206\\c616b81580d1ffab8d7c7ee642bb29a8.png', '南北组同人周边');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '管理员名字',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员密码',
  `status` int(255) NULL DEFAULT NULL COMMENT '管理员状态，1为正常，0为停用',
  `last_login_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员最后登录时间',
  `userphone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员手机号',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, '1639138028', '15706663237');
INSERT INTO `user` VALUES (3, 'xxcy', 'e10adc3949ba59abbe56e057f20f883e', 1, '1639137441', '1008611');
INSERT INTO `user` VALUES (4, 'nhp1', 'e10adc3949ba59abbe56e057f20f883e', 1, '1639138213', '1008611');

SET FOREIGN_KEY_CHECKS = 1;
