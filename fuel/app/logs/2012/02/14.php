<?php defined('COREPATH') or exit('No direct script access allowed'); ?>

Error - 2012-02-14 16:57:35 --> 1054 - Unknown column 't0.user_id' in 'where clause' [ SELECT `t0`.`id` AS `t0_c0`, `t0`.`username` AS `t0_c1`, `t0`.`password` AS `t0_c2`, `t0`.`pin` AS `t0_c3`, `t0`.`email` AS `t0_c4`, `t0`.`saldo` AS `t0_c5`, `t0`.`profile_fields` AS `t0_c6`, `t0`.`last_login` AS `t0_c7`, `t0`.`created_at` AS `t0_c8`, `t0`.`updated_at` AS `t0_c9`, `t0`.`group` AS `t0_c10`, `t0`.`login_hash` AS `t0_c11` FROM `users` AS `t0` WHERE `t0`.`user_id` = 1 LIMIT 1 ] in /Users/christophpeter/sites/bar/fuel/core/classes/database/mysql/connection.php on line 203
Error - 2012-02-14 16:58:13 --> 1054 - Unknown column 't0.user_id' in 'where clause' [ SELECT `t0`.`id` AS `t0_c0`, `t0`.`username` AS `t0_c1`, `t0`.`password` AS `t0_c2`, `t0`.`pin` AS `t0_c3`, `t0`.`email` AS `t0_c4`, `t0`.`saldo` AS `t0_c5`, `t0`.`profile_fields` AS `t0_c6`, `t0`.`last_login` AS `t0_c7`, `t0`.`created_at` AS `t0_c8`, `t0`.`updated_at` AS `t0_c9`, `t0`.`group` AS `t0_c10`, `t0`.`login_hash` AS `t0_c11` FROM `users` AS `t0` WHERE `t0`.`user_id` = 1 LIMIT 1 ] in /Users/christophpeter/sites/bar/fuel/core/classes/database/mysql/connection.php on line 203
Error - 2012-02-14 16:58:33 --> 1054 - Unknown column 't0.user_id' in 'where clause' [ SELECT `t0`.`id` AS `t0_c0`, `t0`.`username` AS `t0_c1`, `t0`.`password` AS `t0_c2`, `t0`.`pin` AS `t0_c3`, `t0`.`email` AS `t0_c4`, `t0`.`saldo` AS `t0_c5`, `t0`.`profile_fields` AS `t0_c6`, `t0`.`last_login` AS `t0_c7`, `t0`.`created_at` AS `t0_c8`, `t0`.`updated_at` AS `t0_c9`, `t0`.`group` AS `t0_c10`, `t0`.`login_hash` AS `t0_c11` FROM `users` AS `t0` WHERE `t0`.`user_id` = 1 LIMIT 1 ] in /Users/christophpeter/sites/bar/fuel/core/classes/database/mysql/connection.php on line 203
Error - 2012-02-14 16:59:02 --> 1054 - Unknown column 't0.user_id' in 'where clause' [ SELECT `t0`.`id` AS `t0_c0`, `t0`.`username` AS `t0_c1`, `t0`.`password` AS `t0_c2`, `t0`.`pin` AS `t0_c3`, `t0`.`email` AS `t0_c4`, `t0`.`saldo` AS `t0_c5`, `t0`.`profile_fields` AS `t0_c6`, `t0`.`last_login` AS `t0_c7`, `t0`.`created_at` AS `t0_c8`, `t0`.`updated_at` AS `t0_c9`, `t0`.`group` AS `t0_c10`, `t0`.`login_hash` AS `t0_c11` FROM `users` AS `t0` WHERE `t0`.`user_id` = 1 LIMIT 1 ] in /Users/christophpeter/sites/bar/fuel/core/classes/database/mysql/connection.php on line 203
Error - 2012-02-14 16:59:40 --> Error - Call to undefined method Fuel\Core\Database_MySQL_Result::get_one() in /Users/christophpeter/sites/bar/fuel/app/classes/model/user.php on line 48
Error - 2012-02-14 16:59:55 --> Error - Call to undefined method Fuel\Core\Database_Query::get_one() in /Users/christophpeter/sites/bar/fuel/app/classes/model/user.php on line 48
Error - 2012-02-14 17:02:39 --> 8 - Undefined index: saldo in /Users/christophpeter/sites/bar/fuel/app/classes/model/user.php on line 49
Error - 2012-02-14 17:02:47 --> 8 - Trying to get property of non-object in /Users/christophpeter/sites/bar/fuel/app/classes/model/user.php on line 49
