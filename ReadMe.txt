drush sql-dump > private/backup/2024-02-28-23-30.sql -- Вигрузити базу
drush sql-drop #- Скинути базу

drush sql-cli < private/backup/2024-02-28-23-30.sql  -- Загрузити базу

drush deploy - ОБОВ'ЯЗКОВО ПІСЛЯ drush sql-cli (загрузити базу)

ssh ubuntu@150.136.62.231 - підключення до Oracle Cloud через SSH

nano /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini - правка xdebug конфігу у ВМ

docker cp $(docker compose ps -q php):/tmp/xdebug/cachegrind.out.XXXX ./cachegrind.out.XXXX

scp -i ~/Downloads/ssh-key-2025-06-09.key ubuntu@150.136.62.231:/home/ubuntu/cachegrind.out.XXXX ./




else if (substr($url, 0, 15) === "/password-reset") {
$page = '../private/pass-reset.php';
$param = substr($url, 16);
}


Додати 4 пункт - Заходи, показувати абсолютно будь яку створену ентетю

Створити в Заходах підсвітку ентеті, час якої підходить до кінця або сьогоднішній день

Додати в Нерухомість можливість загружати image

Убрати номер телефона при створенні адміна value


Finished SQL for real_estates:

WITH UniqueContacts AS (
    SELECT
        id_row,
        group_number,
        name_contacts,
        id_contact_type,
        ROW_NUMBER() OVER (PARTITION BY id_row ORDER BY access_change_date DESC) AS row_num
    FROM contacts
),
RankedRealties AS (
    SELECT
        *,
        ROW_NUMBER() OVER (PARTITION BY id_realties ORDER BY change_date DESC) AS rn
    FROM realties
)
SELECT
 realties.kod,
 HEX(`id_realties`) AS `id_realties`,
 HEX(`fiz_lico`) AS `fiz_lico`,
 HEX(`id_relected_to`) AS `id_relected_to`,
 HEX(realties.id_realtor) AS `id_realtor`,
 HEX(`id_operation`) AS `id_operation`,
 HEX(`id_motivation_status`) AS `id_motivation_status`,
 HEX(`id_object_source`) AS `id_object_source`,
 realties.create_date,
 HEX(`id_activity_status`) AS `id_activity_status`,
 HEX(`id_market_object_status`) AS `id_market_object_status`,
 realties.last_date_contact,
 HEX(`id_realty_type`) AS `id_realty_type`,
 realties.sq,
 realties.price,
 HEX(`id_object_status`) AS `id_object_status`,
 realties.alive_sq,
 realties.num_rooms,
 realties.floor,
 realties.high,
 HEX(`id_region`) AS `id_region`,
 HEX(`id_rooms_adjacency`) AS `id_rooms_adjacency`,
 HEX(`id_wall_material`) AS `id_wall_material`,
 HEX(`id_curency`) AS `id_curency`,
 HEX(`id_realty_type2`) AS `id_realty_type2`,
 realties.kitchen_sq,
 HEX(`id_land_kategory`) AS `id_land_kategory`,
 realties.land_configuration,
 HEX(`id_layout`) AS `id_layout`,
 realties.land_sq,
 realties.num_floors,
 realties.description,
 realties.change_date,
 HEX(`id_region2`) AS `id_region2`,
 HEX(`id_heating_system`) AS `id_heating_system`,
 contacts.group_number,
 contacts.name_contacts,
 HEX(`id_contact_type`) AS `id_contact_type`
FROM RankedRealties realties
LEFT JOIN UniqueContacts contacts
on id_realties = id_row AND contacts.row_num = 1
WHERE realties.rn = 1
ORDER BY realties.kod DESC;



# Команда на міграцію юзерів в Budova

SELECT
 individuals.kod,
HEX(`id_individuals`) AS `id_individuals`,
HEX(`id_client_type`) AS `id_client_type`,
HEX(`id_contact_source`) AS `id_contact_source`,
HEX(individuals.id_realtor) AS `individuals.id_realtor`,
individuals.name_individuals,
individuals.name2_individuals,
individuals.birthday,
individuals.description,
HEX(individuals.id_access_type) AS `id_access_type`,
HEX(individuals.id_access_status) AS `id_access_status`,
individuals.access_change_date,
individuals.create_date,
individuals.change_date,
contacts.group_number,
contacts.name_contacts,
HEX(contacts.id_contact_type) AS `id_contact_type`
FROM `individuals`
LEFT JOIN `contacts`
on id_individuals = id_row





SELECT
    i.kod,
    HEX(i.id_individuals) AS id_individuals,
    HEX(i.id_client_type) AS id_client_type,
    HEX(i.id_contact_source) AS id_contact_source,
    HEX(i.id_realtor) AS id_realtor,
    i.name_individuals,
    i.name2_individuals,
    i.birthday,
    i.description,
    HEX(i.id_access_type) AS id_access_type,
    HEX(i.id_access_status) AS id_access_status,
    i.access_change_date,
    i.create_date,
    i.change_date,
    MAX(c.group_number) AS group_number,
    GROUP_CONCAT(DISTINCT c.name_contacts ORDER BY c.name_contacts SEPARATOR ', ') AS name_contacts,
    GROUP_CONCAT(DISTINCT HEX(c.id_contact_type) ORDER BY c.id_contact_type SEPARATOR ', ') AS id_contact_type
FROM individuals i
LEFT JOIN contacts c
    ON i.id_individuals = c.id_row
GROUP BY
    i.kod,
    i.id_individuals,
    i.id_client_type,
    i.id_contact_source,
    i.id_realtor,
    i.name_individuals,
    i.name2_individuals,
    i.birthday,
    i.description,
    i.id_access_type,
    i.id_access_status,
    i.access_change_date,
    i.create_date,
    i.change_date;













Зробити відображення контактів у view Applications ( номер телефону ) у Заявках ( entity Applications)

Зробити 3 адміністратори всього ( Тимофєєва Інна, Ірина Воздіган, Наталя Стажер)



Natalia
Vozdigan
timofeeva

Зверху Адміністратори, у всіх пароль - 123


rgb(255, 170, 255); - колір для заходів по даті
