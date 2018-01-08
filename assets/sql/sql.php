4/12/17
ALTER TABLE `cartinho_live`.`products`   
  ADD COLUMN `wash_care` VARCHAR(250) NULL AFTER `colors`,
  ADD COLUMN `style_code` VARCHAR(250) NULL AFTER `wash_care`,
  ADD COLUMN `look` VARCHAR(250) NULL AFTER `style_code`,
  ADD COLUMN `size` VARCHAR(250) NULL AFTER `look`,
  ADD COLUMN `material` VARCHAR(250) NULL AFTER `size`,
  ADD COLUMN `occasion` VARCHAR(250) NULL AFTER `material`,
  ADD COLUMN `pattern` VARCHAR(250) NULL AFTER `occasion`,
  ADD COLUMN `sleeve` VARCHAR(250) NULL AFTER `pattern`,
  ADD COLUMN `fit` VARCHAR(250) NULL AFTER `sleeve`,
  ADD COLUMN `gender` ENUM('Male','Female') NULL AFTER `fit`,
  ADD COLUMN `collar_type` VARCHAR(250) NULL AFTER `gender`;
  
  ALTER TABLE `cartinho_live`.`products`   
  ADD COLUMN `set_contents` VARCHAR(250) NULL AFTER `collar_type`;
  
  ALTER TABLE `cartinho_live`.`products`   
  ADD COLUMN `type` VARCHAR(250) NULL AFTER `set_contents`,
  ADD COLUMN `neck_type` VARCHAR(250) NULL AFTER `type`,
  ADD COLUMN `package_contents` VARCHAR(250) NULL AFTER `neck_type`,
  ADD COLUMN `style` VARCHAR(250) NULL AFTER `package_contents`,
  ADD COLUMN `age` VARCHAR(250) NULL AFTER `style`,
  ADD COLUMN `ideal_for` VARCHAR(250) NULL AFTER `age`;
  
  ALTER TABLE `cartinho_live`.`products`   
  ADD COLUMN `blouse_length` VARCHAR(250) NULL AFTER `ideal_for`,
  ADD COLUMN `saree_length` VARCHAR(250) NULL AFTER `blouse_length`,
  ADD COLUMN `pockets` VARCHAR(250) NULL AFTER `saree_length`,
  ADD COLUMN `length` VARCHAR(250) NULL AFTER `pockets`;



5/12/17
ALTER TABLE `cartinho_live`.`products`   
  ADD COLUMN `waterproof` VARCHAR(250) NULL AFTER `length`,
  ADD COLUMN `laptop_compartment` VARCHAR(250) NULL AFTER `waterproof`,
  ADD COLUMN `closure` VARCHAR(250) NULL AFTER `laptop_compartment`,
  ADD COLUMN `wheels` VARCHAR(250) NULL AFTER `closure`,
  ADD COLUMN `no_of_pockets` VARCHAR(250) NULL AFTER `wheels`,
  ADD COLUMN `inner_material` VARCHAR(250) NULL AFTER `no_of_pockets`,
  ADD COLUMN `product_dimension` VARCHAR(250) NULL AFTER `inner_material`;
  
  
  ALTER TABLE `cartinho_live`.`products`   
  ADD COLUMN `f_stop` VARCHAR(250) NULL AFTER `product_dimension`,
  ADD COLUMN `picture_angle` VARCHAR(250) NULL AFTER `f_stop`,
  ADD COLUMN `minimum_focusing_distance` VARCHAR(250) NULL AFTER `picture_angle`,
  ADD COLUMN `aperture_withmaxfocal_length` VARCHAR(250) NULL AFTER `minimum_focusing_distance`,
  ADD COLUMN `aperture_with_minfocal_length` VARCHAR(250) NULL AFTER `aperture_withmaxfocal_length`,
  ADD COLUMN `maximum_focal_length` VARCHAR(250) NULL AFTER `aperture_with_minfocal_length`,
  ADD COLUMN `maximum_reproduction_ratio` VARCHAR(250) NULL AFTER `maximum_focal_length`,
  ADD COLUMN `lens_construction` VARCHAR(250) NULL AFTER `maximum_reproduction_ratio`,
  ADD COLUMN `lens_hood` VARCHAR(250) NULL AFTER `lens_construction`,
  ADD COLUMN `lens_cas` VARCHAR(250) NULL AFTER `lens_hood`,
  ADD COLUMN `lens_cap` VARCHAR(250) NULL AFTER `lens_cas`,
  ADD COLUMN `filter_attachment_size` VARCHAR(250) NULL AFTER `lens_cap`,
  ADD COLUMN `dimension` VARCHAR(250) NULL AFTER `filter_attachment_size`,
  ADD COLUMN `weight` VARCHAR(250) NULL AFTER `dimension`;
  
  ALTER TABLE `cartinho_live`.`products`   
  CHANGE `lens_cas` `lens_case` VARCHAR(250) CHARSET latin1 COLLATE latin1_swedish_ci NULL;
  
  
  
  
  ALTER TABLE `cartinho_live`.`products`   
  ADD COLUMN `resolution` VARCHAR(250) NULL AFTER `weight`,
  ADD COLUMN `sensor_type` VARCHAR(250) NULL AFTER `resolution`,
  ADD COLUMN `lcd_screen_size` VARCHAR(250) NULL AFTER `sensor_type`,
  ADD COLUMN `battery_type` VARCHAR(250) NULL AFTER `lcd_screen_size`,
  ADD COLUMN `lens_mount` VARCHAR(250) NULL AFTER `battery_type`,
  ADD COLUMN `exposure_mode` VARCHAR(250) NULL AFTER `lens_mount`,
  ADD COLUMN `meter_coupling` VARCHAR(250) NULL AFTER `exposure_mode`,
  ADD COLUMN `lens_auto_focus` VARCHAR(250) NULL AFTER `meter_coupling`,
  ADD COLUMN `focus_length` VARCHAR(250) NULL AFTER `lens_auto_focus`,
  ADD COLUMN `focus_point` VARCHAR(250) NULL AFTER `focus_length`,
  ADD COLUMN `focus_lock` VARCHAR(250) NULL AFTER `focus_point`,
  ADD COLUMN `manual_focus` VARCHAR(250) NULL AFTER `focus_lock`,
  ADD COLUMN `af_area_mode` VARCHAR(250) NULL AFTER `manual_focus`,
  ADD COLUMN `detection_range` VARCHAR(250) NULL AFTER `af_area_mode`,
  ADD COLUMN `number_of_dots_effective_pixels` VARCHAR(250) NULL AFTER `detection_range`,
  ADD COLUMN `brightness_setting` VARCHAR(250) NULL AFTER `number_of_dots_effective_pixels`,
  ADD COLUMN `viewfinder` VARCHAR(250) NULL AFTER `brightness_setting`,
  ADD COLUMN `viewfindermagnifiaction` VARCHAR(250) NULL AFTER `viewfinder`,
  ADD COLUMN `aspect_ratio` VARCHAR(250) NULL AFTER `viewfindermagnifiaction`,
  ADD COLUMN `image_size` VARCHAR(250) NULL AFTER `aspect_ratio`,
  ADD COLUMN `image_resolution` VARCHAR(250) NULL AFTER `image_size`,
  ADD COLUMN `video_resolution` VARCHAR(250) NULL AFTER `image_resolution`,
  ADD COLUMN `flash_mode` VARCHAR(250) NULL AFTER `video_resolution`,
  ADD COLUMN `flash_range` VARCHAR(250) NULL AFTER `flash_mode`,
  ADD COLUMN `built_in_flash` VARCHAR(250) NULL AFTER `flash_range`,
  ADD COLUMN `external_flash` VARCHAR(250) NULL AFTER `built_in_flash`,
  ADD COLUMN `audio_recording_device` VARCHAR(250) NULL AFTER `external_flash`,
  ADD COLUMN `audio_recording_format` VARCHAR(250) NULL AFTER `audio_recording_device`,
  ADD COLUMN `video_compression` VARCHAR(250) NULL AFTER `audio_recording_format`,
  ADD COLUMN `face_detection` VARCHAR(250) NULL AFTER `video_compression`,
  ADD COLUMN `video_format` VARCHAR(250) NULL AFTER `face_detection`,
  ADD COLUMN `image_format` VARCHAR(250) NULL AFTER `video_format`,
  ADD COLUMN `microphone` VARCHAR(250) NULL AFTER `image_format`,
  ADD COLUMN `pictbridge` VARCHAR(250) NULL AFTER `microphone`,
  ADD COLUMN `card_type` VARCHAR(250) NULL AFTER `pictbridge`,
  ADD COLUMN `supplied_battery` VARCHAR(250) NULL AFTER `card_type`,
  ADD COLUMN `ac_adapter` VARCHAR(250) NULL AFTER `supplied_battery`,
  ADD COLUMN `iso_rating` VARCHAR(250) NULL AFTER `ac_adapter`,
  ADD COLUMN `iso_sensitivity` VARCHAR(250) NULL AFTER `iso_rating`,
  ADD COLUMN `dust_reduction` VARCHAR(250) NULL AFTER `iso_sensitivity`,
  ADD COLUMN `metering_method` VARCHAR(250) NULL AFTER `dust_reduction`,
  ADD COLUMN `metering_system` VARCHAR(250) NULL AFTER `metering_method`,
  ADD COLUMN `supported_languages` VARCHAR(250) NULL AFTER `metering_system`,
  ADD COLUMN `sync_terminal` VARCHAR(250) NULL AFTER `supported_languages`,
  ADD COLUMN `view_finder` VARCHAR(250) NULL AFTER `sync_terminal`,
  ADD COLUMN `white_balancing` VARCHAR(250) NULL AFTER `view_finder`,
  ADD COLUMN `hdmi` VARCHAR(250) NULL AFTER `white_balancing`,
  ADD COLUMN `self_timer` VARCHAR(250) NULL AFTER `hdmi`,
  ADD COLUMN `scene_modes` VARCHAR(250) NULL AFTER `self_timer`,
  ADD COLUMN `environment` VARCHAR(250) NULL AFTER `scene_modes`;
  
  ALTER TABLE `cartinho_live`.`products`   
  ADD COLUMN `series` VARCHAR(250) NULL AFTER `environment`,
  ADD COLUMN `part_number` VARCHAR(250) NULL AFTER `series`,
  ADD COLUMN `hdd_capacity` VARCHAR(250) NULL AFTER `part_number`,
  ADD COLUMN `processorbrand` VARCHAR(250) NULL AFTER `hdd_capacity`,
  ADD COLUMN `variant` VARCHAR(250) NULL AFTER `processorbrand`,
  ADD COLUMN `chipset` VARCHAR(250) NULL AFTER `variant`,
  ADD COLUMN `clock_speed` VARCHAR(250) NULL AFTER `chipset`,
  ADD COLUMN `cache` VARCHAR(250) NULL AFTER `clock_speed`,
  ADD COLUMN `screen_type` VARCHAR(250) NULL AFTER `cache`,
  ADD COLUMN `graphic_processor` VARCHAR(250) NULL AFTER `screen_type`,
  ADD COLUMN `memory_slots` VARCHAR(250) NULL AFTER `graphic_processor`,
  ADD COLUMN `rpm` VARCHAR(250) NULL AFTER `memory_slots`,
  ADD COLUMN `optical_drive` VARCHAR(250) NULL AFTER `rpm`,
  ADD COLUMN `wan` VARCHAR(250) NULL AFTER `optical_drive`,
  ADD COLUMN `ethernet` VARCHAR(250) NULL AFTER `wan`,
  ADD COLUMN `vgaport` VARCHAR(250) NULL AFTER `ethernet`,
  ADD COLUMN `usb_port` VARCHAR(250) NULL AFTER `vgaport`,
  ADD COLUMN `hdmi_port` VARCHAR(250) NULL AFTER `usb_port`,
  ADD COLUMN `multi_card_slot` VARCHAR(250) NULL AFTER `hdmi_port`,
  ADD COLUMN `web_camera` VARCHAR(250) NULL AFTER `multi_card_slot`,
  ADD COLUMN `keyboard` VARCHAR(250) NULL AFTER `web_camera`,
  ADD COLUMN `speakers` VARCHAR(250) NULL AFTER `keyboard`,
  ADD COLUMN `mic_in` VARCHAR(250) NULL AFTER `speakers`,
  add column `power_supply` varchar(250) NULL after `mic_in`,
  add column `battery_backup` varchar(250) NULL after `power_supply`,
  add column `battery_cell` varchar(250) NULL after `battery_backup`,
  add column `adapter` varchar(250) NULL after `battery_cell`,
  add column `office` varchar(250) NULL after `adapter`,
  add column `fingerprint_point` varchar(250) NULL after `office`;
  
  ALTER TABLE `cartinho_live`.`products`   
  ADD COLUMN `noise_reduction` VARCHAR(250) NULL AFTER `fingerprint_point`,
  ADD COLUMN `connectivity` VARCHAR(250) NULL AFTER `noise_reduction`,
  ADD COLUMN `headphone_jack` VARCHAR(250) NULL AFTER `connectivity`,
  ADD COLUMN `compatible_for` VARCHAR(250) NULL AFTER `headphone_jack`;

  
  6/12/17
  ALTER TABLE `cartinho_live`.`products`   
  ADD COLUMN `total_power_output` VARCHAR(250) NULL AFTER `compatible_for`,
  ADD COLUMN `sound_system` VARCHAR(250) NULL AFTER `total_power_output`,
  ADD COLUMN `speaker_driver` VARCHAR(250) NULL AFTER `sound_system`,
  ADD COLUMN `power` VARCHAR(250) NULL AFTER `speaker_driver`,
  ADD COLUMN `wired_wireless` VARCHAR(250) NULL AFTER `power`,
  ADD COLUMN `bluetooth_range` VARCHAR(250) NULL AFTER `wired_wireless`;
  
  
  
  
  
  ALTER TABLE `cartinho_live`.`products`   
  ADD COLUMN `model_series` VARCHAR(250) NULL AFTER `bluetooth_range`,
  ADD COLUMN `installation` VARCHAR(250) NULL AFTER `model_series`,
  ADD COLUMN `warranty_card` VARCHAR(250) NULL AFTER `installation`,
  ADD COLUMN `functions` VARCHAR(250) NULL AFTER `warranty_card`,
  ADD COLUMN `printer_type` VARCHAR(250) NULL AFTER `functions`,
  ADD COLUMN `interface` VARCHAR(250) NULL AFTER `printer_type`,
  ADD COLUMN `printer_output` VARCHAR(250) NULL AFTER `interface`,
  ADD COLUMN `max_print_resolution` VARCHAR(250) NULL AFTER `printer_output`,
  ADD COLUMN `print_speed` VARCHAR(250) NULL AFTER `max_print_resolution`,
  ADD COLUMN `scanner_type` VARCHAR(250) NULL AFTER `print_speed`,
  ADD COLUMN `document_size` VARCHAR(250) NULL AFTER `scanner_type`,
  ADD COLUMN `scanning_resolution` VARCHAR(250) NULL AFTER `document_size`,
  ADD COLUMN `copies_from` VARCHAR(250) NULL AFTER `scanning_resolution`,
  ADD COLUMN `copy_size` VARCHAR(250) NULL AFTER `copies_from`,
  ADD COLUMN `iso_29183` VARCHAR(250) NULL AFTER `copy_size`,
  ADD COLUMN `noise_level` VARCHAR(250) NULL AFTER `iso_29183`,
  ADD COLUMN `paper_hold_input` VARCHAR(250) NULL AFTER `noise_level`,
  ADD COLUMN `paper_hold_output` VARCHAR(250) NULL AFTER `paper_hold_input`,
  ADD COLUMN `paper_size` VARCHAR(250) NULL AFTER `paper_hold_output`,
  ADD COLUMN `print_margin` VARCHAR(250) NULL AFTER `paper_size`,
  ADD COLUMN `standby` VARCHAR(250) NULL AFTER `print_margin`,
  ADD COLUMN `operating_temperature_range` VARCHAR(250) NULL AFTER `standby`,
  ADD COLUMN `frequency` VARCHAR(250) NULL AFTER `operating_temperature_range`;
  
  
  
  footware
  
  
  ALTER TABLE `cartinho_live`.`products`   
  ADD COLUMN `sole_material` VARCHAR(250) NULL AFTER `frequency`,
  ADD COLUMN `fastening` VARCHAR(250) NULL AFTER `sole_material`,
  ADD COLUMN `toe_shape` VARCHAR(250) NULL AFTER `fastening`,
  ADD COLUMN `ean_upc` VARCHAR(250) NULL AFTER `toe_shape`;

  
  
  
  ALTER TABLE `cartinho_live`.`products`   
  CHANGE `item_image1` `item_image1` VARCHAR(250) NULL;

ALTER TABLE `cartinho_live`.`products`   
  ADD COLUMN `use` VARCHAR(250) NULL AFTER `ean_upc`;



ALTER TABLE `cartinhoursstaging_db`.`products`   
  CHANGE `use` `useage` VARCHAR(250) CHARSET latin1 COLLATE latin1_swedish_ci NULL;
  
  
  
  /*4/1/2018
  ALTER TABLE `cartinhoursstaging_db`.`products`   
  ADD COLUMN `factor` VARCHAR(250) NULL AFTER `useage`;

  
  ALTER TABLE `cartinho_live`.`products`   
  ADD COLUMN `connector1` VARCHAR(250) NULL AFTER `factor`,
  ADD COLUMN `connector2` VARCHAR(250) NULL AFTER `connector1`;

ALTER TABLE `cartinho_live`.`products`   
  ADD COLUMN `voltagerange` VARCHAR(250) NULL AFTER `remotecontrol`,
  ADD COLUMN `turbospeed` VARCHAR(250) NULL AFTER `voltagerange`,
  ADD COLUMN `graphics` VARCHAR(250) NULL AFTER `turbospeed`;
  
  
ALTER TABLE `cartinhoursstaging_db`.`products`   
  ADD COLUMN `capacity` VARCHAR(250) NULL AFTER `graphics`,
  ADD COLUMN `datarate` VARCHAR(250) NULL AFTER `capacity`,
  ADD COLUMN `technology` VARCHAR(250) NULL AFTER `datarate`;
  
  ALTER TABLE `cartinhoursstaging_db`.`products`   
  DROP COLUMN `item_image8`, 
  DROP COLUMN `item_image9`, 
  DROP COLUMN `item_image10`, 
  DROP COLUMN `item_image11`, 
  DROP COLUMN `offer_time`, 
  ADD COLUMN `externaldrivebays` VARCHAR(250) NULL AFTER `technology`,
  ADD COLUMN `internaldrivebays` VARCHAR(250) NULL AFTER `externaldrivebays`,
  ADD COLUMN `micport` VARCHAR(250) NULL AFTER `internaldrivebays`;
  
  
  
  
  ALTER TABLE `cartinhoursstaging_db`.`products`   
  ADD COLUMN `inputvoltage` VARCHAR(250) NULL AFTER `micport`,
  ADD COLUMN `outputvoltage` VARCHAR(250) NULL AFTER `inputvoltage`,
  ADD COLUMN `inputfrequency` VARCHAR(250) NULL AFTER `outputvoltage`;



