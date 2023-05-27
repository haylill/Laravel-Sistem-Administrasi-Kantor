
## How To Run

`SET SESSION_LIFETIME IN .env =525600`

`php artisan db:seed`

`php artisan migrate`

## Add Event On Database
- Run this Comannd on SQL
```
DROP EVENT IF EXISTS `EvtGaji`; CREATE DEFINER=`root`@`localhost` EVENT `EvtGaji` ON SCHEDULE EVERY 1 MONTH STARTS '2023-06-01 00:00:00' ON COMPLETION PRESERVE ENABLE DO INSERT INTO penggajian (penggajian.id_karyawan,penggajian.total_masuk,penggajian.total_gaji,penggajian.created_at,penggajian.updated_at) SELECT absensi.id_karyawan,DATE_FORMAT(waktu, "%m") = DATE_FORMAT(CURDATE(),"%m") AS total_masuk,(CONVERT(DATE_FORMAT(waktu, "%m") = DATE_FORMAT(CURDATE(),"%m"),UNSIGNED INTEGER) * gaji) + bonus as total_gaji, NOW() as created_at ,NOW() as updated_at FROM absensi,users,gaji WHERE DATE_FORMAT(waktu, "%m") = DATE_FORMAT(CURDATE(),"%m") AND absensi.id_karyawan = users.id_karyawan and gaji.id_karyawan = users.id_karyawan;
```
NB : Change STARTS Value To Next Month (Example : 2023-07-01 00:00:00)

## Next Progress
 DONE !!! TESTING !!!

## About
This Website For Exam RPL 2023, Build With `Laravel`
