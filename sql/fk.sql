
ALTER TABLE `users` ADD CONSTRAINT `countries_countries_id_fk`
FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`);


ALTER TABLE `users` ADD CONSTRAINT `regions_regions_id_fk`
FOREIGN KEY (`regions_id`) REFERENCES `regions` (`id`);


ALTER TABLE `users` ADD CONSTRAINT `cities_cities_id_fk`
FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`);