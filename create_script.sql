CREATE TABLE `tbl_cust` (
  `id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `m_name` text NOT NULL,
  `l_name` text NOT NULL,
  `company_name` text NOT NULL,
  `code` text NOT NULL,
  `gst` text NOT NULL,
  `pan` text NOT NULL,
  `address` text NOT NULL,
  `permenant_mo` text NOT NULL,
  `alt_mo` text NOT NULL,
  `email` text NOT NULL,
  `website` text NOT NULL,
  `image_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tbl_sup` (
  `id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `m_name` text NOT NULL,
  `l_name` text NOT NULL,
  `company_name` text NOT NULL,
  `code` text NOT NULL,
  `gst` text NOT NULL,
  `pan` text NOT NULL,
  `address` text NOT NULL,
  `permenant_mo` text NOT NULL,
  `alt_mo` text NOT NULL,
  `email` text NOT NULL,
  `website` text NOT NULL,
  `image_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tbl_uom` (
  `id` int(11) NOT NULL,
  `uom_name` text NOT NULL,
  `uom_desc` text NOT NULL,
  `unit` double NOT NULL,
  `con_uom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tbl_cust`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_sup`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_uom`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `tbl_cust`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

ALTER TABLE `tbl_sup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `tbl_uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE `tbl_uom` CHANGE `unit` `unit` DOUBLE NULL DEFAULT NULL, CHANGE `con_uom_id` `con_uom_id` INT(11) NULL DEFAULT NULL;

CREATE TABLE `invoice`.`tbl_item` ( `id` INT(5) NOT NULL AUTO_INCREMENT , `itemName` VARCHAR(255) NULL DEFAULT NULL , `itemType` VARCHAR(255) NULL DEFAULT NULL , `itemDesc` VARCHAR(255) NULL DEFAULT NULL , `itemImgPath` VARCHAR(255) NULL DEFAULT NULL , `uomModel` BIGINT(5) NULL DEFAULT NULL , `itemStock` DOUBLE NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB

ALTER TABLE `tbl_item` CHANGE `uomModel` `uomModel` INT(11) NULL DEFAULT NULL;