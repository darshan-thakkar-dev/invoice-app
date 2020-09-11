CREATE TABLE `tbl_cust` ( `id` INT NOT NULL AUTO_INCREMENT , `f_name` TEXT NOT NULL , `m_name` TEXT NOT NULL , `l_name` TEXT NOT NULL , `comapny_name` TEXT NOT NULL , `code` TEXT NOT NULL , `gst` TEXT NOT NULL , `pan` TEXT NOT NULL , `address` TEXT NOT NULL , `permenant_mo` TEXT NOT NULL , `alt_mo` TEXT NOT NULL , `email` TEXT NOT NULL , `website` TEXT NOT NULL , `image_name` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 

CREATE TABLE `tbl_sup` ( `id` INT NOT NULL AUTO_INCREMENT , `f_name` TEXT NOT NULL , `m_name` TEXT NOT NULL , `l_name` TEXT NOT NULL , `comapny_name` TEXT NOT NULL , `code` TEXT NOT NULL , `gst` TEXT NOT NULL , `pan` TEXT NOT NULL , `address` TEXT NOT NULL , `permenant_mo` TEXT NOT NULL , `alt_mo` TEXT NOT NULL , `email` TEXT NOT NULL , `website` TEXT NOT NULL , `image_name` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB; 


// item_id,item_name,image,descr,op stock,uom ref item type

//uom_id,uom_name,uom_desc,unit,converted_uom
