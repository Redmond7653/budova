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









Добре, але є доповнення, дублікати не робити, і шукати саме ті що я написав в моделі, наприклад:

Якщо я написав
- Ковель
- Ковельський р-йн

То записати тільки ці, тобто 2 штуки. І також додай колонку саму першу, де будуть йти ID з 1 і так далі, якщо впаде щось лишнє, то скажу який ID забрати

Даю повну модель:

Валюта:
- Гривни
-  Долари
- Євро

Вид нерухомості:
- Приватний сектор
- Земельна ділянка
- Квартири
- Комерційна нерухомість

Джерело надходження об'єктів:
- СПП/Колеги
- Офіс
- Дом.ріа
- Олх
- Рекомендація
- ТЦК
- Текстові списки

Матеріал стін:
 - Цегляний
 - Панельний
 - Блочний
 - Глинобитний
 - Глинобитний, обкладений цеглиною
 - Глинобитний, обкладений плиткою
 - Шлакоблок
 - Піноблок
 - Газобетон
 - Монолит
 - Дерев'яний
 - Комбінований

Опалювання:
 - Газове
 - Електричне

Операція по нерухомості:
- Продажа
- Аренда

Планування квартири:
- Новобудова
 - Чешка
- Покращенне планування
- Хрущівка
 - Малосімейка
 - Кімната в гуртожитку

Район міста:
- Ковель
- Ковельський р-н

Підрайон міста:
-Бреська, Ковель
- Ковель-2, Ковель
- Ватутіна, Ковель
- Сільмаш, Ковель
- Володимирська, Ковель
- Черемушкі, Ковель
- Привокзальна, Ковель
- Центр, Ковель
- Василька, Ковельський р-н
- Луков, Ковельський р-н
- Городилець, Ковельський р-н
- Люблинець, Ковельський р-н
- Голоби, Ковельський р-н
- Турійськ, Ковельський р-н

Тип нерухомості:
-Дім, Приватний сектор
- Частина дому, Приватний сектор
- Дача, Приватний сектор
- Комерційна земля, Земельна ділянка
- СГ, Земельна ділянка
- Земля під застройку, Земельна ділянка
- Земельний участок, Земельна ділянка
- Квартира, Квартири
- Кімната, Квартири
- Багатоцільова, Комерційна Нерухомість
- СТО, Комерційна Нерухомість
- Готельно-ресторанний комплекс, Комерційна Нерухомість
- Офіс, Комерційна нерухомість
 - Торгова площадка, Комерційна нерухомість


ChatGPT said:
Зрозумів! Я сформую CSV-файл за твоєю моделлю:

Візьму лише ті значення, які ти вказав.
Додам першу колонку з ID (1, 2, 3...).
Додам parent_id, якщо це потрібно (для вкладених термінів).
Зараз зроблю оновлений файл. 🚀
Готово! Оновлений CSV-файл можна завантажити тут:

⬇ Завантажити final_taxonomy.csv

Перевір, чи все правильно. Якщо потрібно щось змінити або видалити зайві записи, дай знати! 🚀 ​​






You said:
Цей самий файл перероби, але в field parent_id запиши не ID, а term_id.

І коли є записа наприклад, "Бреська, Ковель", це означає що в term_name має піти тільки "Бреська", а те що йде після коми, потрібно знайти в таблички його term_id, це буде Ковель і записати в поле parent_id

Перероби зважаючи на це


Дивись, цей самий файл, але в term_id запиши якісь свій ID, не треба великий, почни наприклад з 20 і зроби так, щоб не було пустих полів крім term_description і term_weight

Наприклад строка 61 у файлі, поле parent_id пусте. Запиши туди ID зі строки 7, те яке ти придумаєш на поле term_id
