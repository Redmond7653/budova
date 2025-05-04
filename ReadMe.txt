drush sql-dump > private/backup/2024-02-28-23-30.sql -- Вигрузити базу
drush sql-drop #- Скинути базу

drush sql-cli < private/backup/2024-02-28-23-30.sql  -- Загрузити базу





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





Зробити відображення контактів у view Applications ( номер телефону ) у Заявках ( entity Applications)

Зробити 3 адміністратори всього ( Тимофєєва Інна, Ірина Воздіган, Наталя Стажер)



Natalia
Vozdigan
timofeeva

Зверху Адміністратори, у всіх пароль - 123


rgb(255, 170, 255); - колір для заходів по даті
