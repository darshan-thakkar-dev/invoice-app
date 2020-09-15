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


CREATE TABLE `tbl_invoice_count` (
  `id` int(11) NOT NULL,
  `count` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `tbl_invoice_count`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


INSERT INTO `tbl_invoice_count` (`id`, `count`) VALUES
(1, 0);


CREATE TABLE `invoice`.`tbl_invoice` ( `id` INT(5) NOT NULL , `invoiceNumber` VARCHAR(255) NULL , `date` DATE NULL , `isNewCustomer` BOOLEAN NOT NULL , `customerName` VARCHAR(255) NULL , `customerMo` VARCHAR(255) NULL , `customerAddress` VARCHAR(255) NULL , `existingCustomerId` INT(11) NULL , `remark` VARCHAR(255) NULL , `subTotal` DOUBLE NULL DEFAULT '0.0' , `totalTax` DOUBLE NULL DEFAULT '0.0' , `totalDiscount` DOUBLE NULL DEFAULT '0.0' , `extraCharges` DOUBLE NULL DEFAULT '0.0' , `totalDue` DOUBLE NULL DEFAULT '0.0' , `total` DOUBLE NULL DEFAULT '0.0' , PRIMARY KEY (`id`)) ENGINE = InnoDB

ALTER TABLE `tbl_invoice`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


CREATE TABLE `invoice`.`tbl_invoice_details` ( `id` INT(5) NOT NULL AUTO_INCREMENT , `item` INT NOT NULL , `uom` INT NOT NULL , `weight` DOUBLE NOT NULL DEFAULT '0.0' , `price` DOUBLE NOT NULL DEFAULT '0.0' , `tax` DOUBLE NOT NULL DEFAULT '0.0' , PRIMARY KEY (`id`(5))) ENGINE = InnoDB;


ALTER TABLE `tbl_invoice_details` ADD `invoiceId` INT(5) NOT NULL AFTER `tax`;

ALTER TABLE `tbl_invoice_details` ADD CONSTRAINT `invoiceId` FOREIGN KEY (`invoiceId`) REFERENCES `tbl_invoice`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `tbl_invoice_details` CHANGE `invoice_id` `invoiceId` INT(11) NOT NULL;