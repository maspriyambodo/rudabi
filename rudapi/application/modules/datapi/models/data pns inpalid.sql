SELECT
	master_penyuluh_pns.penyuluh_pns_id AS id_pns, 
	master_penyuluh_pns.penyuluh_pns_tgl_lahir AS id_pns, 
	master_penyuluh_pns.penyuluh_pns_nama, 
	app_city.city_title, 
	app_province.province_title,
	master_penyuluh_pns.user_add, 
	master_penyuluh_pns.time_add, 
	app_user.user_name, 
	app_user.user_fullname, 
	app_user.user_email
FROM
	master_penyuluh_pns
	LEFT JOIN
	app_city
	ON 
		master_penyuluh_pns.penyuluh_pns_city = app_city.city_id
	LEFT JOIN
	app_user
	ON 
		master_penyuluh_pns.user_add = app_user.user_id
	LEFT JOIN
	app_province
	ON 
		master_penyuluh_pns.penyuluh_pns_provinsi = app_province.province_id
WHERE
	master_penyuluh_pns.penyuluh_pns_nama IS NULL OR
	master_penyuluh_pns.penyuluh_pns_tgl_lahir IS NULL OR
	master_penyuluh_pns.penyuluh_pns_tgl_lahir BETWEEN '0000-00-00' AND '1905-00-00' OR
	master_penyuluh_pns.penyuluh_pns_tgl_lahir BETWEEN '2008-00-00' AND '2068-00-00' AND
	master_penyuluh_pns.is_trash = 0
ORDER BY
	master_penyuluh_pns.penyuluh_pns_tgl_lahir DESC
