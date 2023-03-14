-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Час створення: Жов 21 2019 р., 15:01
-- Версія сервера: 5.6.45-cll-lve
-- Версія PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `u13631_demka281`
--

-- --------------------------------------------------------

--
-- Структура таблиці `al_polzov_a`
--

CREATE TABLE `al_polzov_a` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `referer` varchar(10) NOT NULL,
  `user_avp` varchar(20) NOT NULL DEFAULT 'no.jpg',
  `referer_id` int(11) NOT NULL DEFAULT '0',
  `referals` int(11) NOT NULL DEFAULT '0',
  `date_reg` int(11) NOT NULL DEFAULT '0',
  `date_login` int(11) NOT NULL DEFAULT '0',
  `ip` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `banned` int(1) NOT NULL DEFAULT '0',
  `hide` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп даних таблиці `al_polzov_a`
--

INSERT INTO `al_polzov_a` (`id`, `user`, `email`, `pass`, `referer`, `user_avp`, `referer_id`, `referals`, `date_reg`, `date_login`, `ip`, `banned`, `hide`) VALUES
(1, '111111', '111111@ya.ru', '111111', 'admin', 'no.jpg', 1, 1, 1571419248, 1571658911, 3164829703, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблиці `db_advpic`
--

CREATE TABLE `db_advpic` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `sum` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `url` varchar(50) NOT NULL,
  `banner` varchar(80) NOT NULL DEFAULT '/img/468x60.jpg',
  `date_add` int(11) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `db_bonus_list`
--

CREATE TABLE `db_bonus_list` (
  `id` int(11) NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `sum` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_chat`
--

CREATE TABLE `db_chat` (
  `id` int(11) NOT NULL,
  `user` varchar(100) CHARACTER SET cp1250 NOT NULL,
  `tekst` text NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_competition`
--

CREATE TABLE `db_competition` (
  `id` int(11) NOT NULL,
  `1m` double NOT NULL DEFAULT '0',
  `2m` double NOT NULL DEFAULT '0',
  `3m` double NOT NULL DEFAULT '0',
  `user_1` varchar(10) NOT NULL,
  `user_2` varchar(10) NOT NULL,
  `user_3` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_end` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_competition_users`
--

CREATE TABLE `db_competition_users` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `points` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_conabrul`
--

CREATE TABLE `db_conabrul` (
  `id` int(11) NOT NULL,
  `rules` text NOT NULL,
  `about` text NOT NULL,
  `contacts` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп даних таблиці `db_conabrul`
--

INSERT INTO `db_conabrul` (`id`, `rules`, `about`, `contacts`) VALUES
(1, '<p><address>1. ОБЩИЕ ПОЛОЖЕНИЯ</address><address>1.1. Зарегистрировавшись на проекте, Вы соглашаетесь с правилами данного сайта в&nbsp;полном&nbsp;объеме.</address><address>1.2.&nbsp;Администрация гарантирует доход, даже если не будет новых пользователей и пополнений, бюджет сайта будет пополняться с доходов от рекламы.</address><address>Цель сайта не собрать побольше денег с народа, а увеличить посещаемость.&nbsp;</address><address>&nbsp;1.3. В случае игнорирования данных правил или их несоблюдения аккаунт подлежит блокировке. Все денежные средства и игровые предметы переходят в собственность проекта.</address><address>1.4.&nbsp;Администрация может вносить в эти правила изменения без предупреждения&nbsp; об этом пользователей.</address><address>&nbsp;1.5.&nbsp;Администрация не несет ответственности за возможный взлом аккаунтов.</address><address>&nbsp;1.6. Регистрируясь на проекте, пользователь соглашается быть чьим-либо рефералом, и обязуется не выражать свои претензии по этому поводу администрации.</address><address>&nbsp;1.7.&nbsp;Администрация проекта не несет ответственности &nbsp;за активность рефералов.</address><address>&nbsp;1.8.&nbsp;При оплате каких либо услуг, а затем отказа от их использования, денежные средства не возвращаются.</address><address>1.9. Администрация вправе устанавливать цены на игровые предметы&nbsp; по своему усмотрению.</address><address>1.10. Пополнение резерва с доходов от рекламных материалов.</address><address>1.11. Администрация может распоряжаться до 20% от доходов &nbsp;сайта на свое усмотрение.</address><address>1.12. Резерв проекта формируется по формуле 100% пополнений+100% от рекламы -20% доход Администратора</address><address>Администрация&nbsp;вправе&nbsp;&nbsp;заблокировать аккакнт пользователя за подозрительную активность предворительно связавшись с пользователем.</address><address>2. ОБЯЗАННОСТИ ПРОЕКТА</address><address>&nbsp;2.1. Сохранять конфиденциальность информации зарегистрированного пользователя, полученной от него при регистрации, не разглашать информацию третьей стороне.</address><address>2.2. При возникновении технических проблем возобновить работу проекта в течение 3-5 суток.</address><address>&nbsp;2.3.&nbsp;Выплачивать пользователям заработанные денежные средства в течении 3-х дней с момента заказа выплаты. На&nbsp;payeer выплаты моментальные</address><address>&nbsp;2.4.&nbsp;Отвечать на письма, присланные в службу технической поддержки (писать в скайп).</address><address>3. ОБЯЗАННОСТИ ПОЛЬЗОВАТЕЛЕЙ</address><address>&nbsp;3.1. При регистрации указывать правдивую информацию во всех полях регистрационной формы.</address><address>3.2.&nbsp;Не реже одного раза в неделю знакомиться с данными правилами.</address><address>&nbsp;3.3. Не регистрировать более одного аккаунта. (Вход в два разных аккаунта с одного компьютера считается нарушением).</address><address>&nbsp;3.4. При обнаружении неисправностей либо некоторых погрешностей проекта незамедлительно сообщать в службу поддержки.</address><address>&nbsp;3.5.&nbsp;Не проводить попыток взлома проекта и не использовать возможные ошибки для собственной выгоды</address><address>&nbsp;3.6.&nbsp;Не использовать для рекламы своей партнерской ссылки СПАМ рассылки.</address><address>&nbsp;3.7.&nbsp;Не публиковать оскорбительных сообщений, клевету и иные виды сообщений портящих репутацию проекта или пользователей.</address></p>', '<p class=\"ListParagraphCxSpFirst\"><span>Приветствуем Вас в нашей инвестиционной игре и благодарим за проявленный интерес к сайту.</span><br /><br /><span>В первую очередь хотим акцентировать внимание на том, что мы не обещаем баснословной прибыли уже через 3-5-14 дней! В нашем проекте Вы не увидите сумасшедших акций на +400% к вложенной сумме или 200% сразу на вывод.</span><br /><br /><span>Мы позиционируем себя как проект, готовый осуществлять выплату в течение длительного периода времени. Проект, который станет Вам надежной опорой и улучшит Ваше финансовое положение в ближайшем будущем. Проект честный и открытый, который поможет Вам приумножить свои средства.</span><br /><br /><span>Доходность в нашем проекте на прямую зависит от суммы Ваших инвестиций и составляет от 30% до 80% в месяц, но Вы легко можете увеличивать эти цифры, привлекая в проект своих друзей или просто инвесторов, для этого им необходимо всего лишь зарегистрироваться по Вашей реферальной ссылке и сделать инвестицию в наш проект.</span><br /><br /><span>У нас нет халявы, но мы обещаем Вам стабильный доход, бесперебойные выплаты и честные условия - присоединяйтесь!.</span></p>', '<p><strong><span style=\"font-size: medium;\">По всем вопросам, связанным с проектом просьба обращаться: </span><br /><br /><span style=\"font-size: medium; color: #008000;\">Ваш Емейл</span></strong></p>\r\n<p><strong><span style=\"font-size: medium;\">Внимание! При обращении обязательно указывайте свой логин на проекте и краткую суть обращения!&nbsp;</span><br /><span style=\"font-size: medium;\"> Письма без указания логина рассмотрены не будут!</span></strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Структура таблиці `db_confligsg`
--

CREATE TABLE `db_confligsg` (
  `id` int(11) NOT NULL,
  `admin` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `min_pay` double NOT NULL DEFAULT '15',
  `ser_per_wmr` int(11) NOT NULL DEFAULT '1000',
  `ser_per_wmz` int(11) NOT NULL DEFAULT '3300',
  `ser_per_wme` int(11) NOT NULL DEFAULT '4200',
  `percent_swap` int(11) NOT NULL DEFAULT '0',
  `percent_sell` int(2) NOT NULL DEFAULT '10',
  `items_per_coin` int(11) NOT NULL DEFAULT '7',
  `a_in_h` int(11) NOT NULL DEFAULT '0',
  `b_in_h` int(11) NOT NULL DEFAULT '0',
  `c_in_h` int(11) NOT NULL DEFAULT '0',
  `d_in_h` int(11) NOT NULL DEFAULT '0',
  `e_in_h` int(11) NOT NULL DEFAULT '0',
  `amount_a_t` int(11) NOT NULL DEFAULT '0',
  `amount_b_t` int(11) NOT NULL DEFAULT '0',
  `amount_c_t` int(11) NOT NULL DEFAULT '0',
  `amount_d_t` int(11) NOT NULL DEFAULT '0',
  `amount_e_t` int(11) NOT NULL DEFAULT '0',
  `percent_back` double NOT NULL,
  `f_in_h` int(11) NOT NULL DEFAULT '0',
  `amount_f_t` int(11) NOT NULL DEFAULT '0',
  `g_in_h` int(11) NOT NULL DEFAULT '0',
  `amount_g_t` int(11) NOT NULL DEFAULT '0',
  `h_in_h` int(11) NOT NULL DEFAULT '0',
  `amount_h_t` int(11) NOT NULL DEFAULT '0',
  `j_in_h` int(11) NOT NULL DEFAULT '0',
  `amount_j_t` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп даних таблиці `db_confligsg`
--

INSERT INTO `db_confligsg` (`id`, `admin`, `pass`, `min_pay`, `ser_per_wmr`, `ser_per_wmz`, `ser_per_wme`, `percent_swap`, `percent_sell`, `items_per_coin`, `a_in_h`, `b_in_h`, `c_in_h`, `d_in_h`, `e_in_h`, `amount_a_t`, `amount_b_t`, `amount_c_t`, `amount_d_t`, `amount_e_t`, `percent_back`, `f_in_h`, `amount_f_t`, `g_in_h`, `amount_g_t`, `h_in_h`, `amount_h_t`, `j_in_h`, `amount_j_t`) VALUES
(1, 'admin', 'admin', 20, 100, 3300, 4200, 10, 99, 100, 7, 70, 370, 1920, 9650, 100, 1000, 5000, 25000, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблиці `db_games_knb`
--

CREATE TABLE `db_games_knb` (
  `id` int(11) NOT NULL,
  `summa` decimal(7,2) NOT NULL,
  `item` int(1) NOT NULL,
  `login` varchar(10) NOT NULL,
  `dat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `db_games_wheel`
--

CREATE TABLE `db_games_wheel` (
  `id` int(11) NOT NULL,
  `user` varchar(20) COLLATE cp1251_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `win` varchar(50) COLLATE cp1251_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COLLATE=cp1251_bin;

-- --------------------------------------------------------

--
-- Структура таблиці `db_insert_money`
--

CREATE TABLE `db_insert_money` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `money` double NOT NULL DEFAULT '0',
  `serebro` int(11) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_lottery`
--

CREATE TABLE `db_lottery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(10) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_lottery_winners`
--

CREATE TABLE `db_lottery_winners` (
  `id` int(11) NOT NULL,
  `user_a` varchar(10) NOT NULL,
  `bil_a` int(11) NOT NULL DEFAULT '0',
  `user_b` varchar(10) NOT NULL,
  `bil_b` int(11) NOT NULL DEFAULT '0',
  `user_c` varchar(10) NOT NULL,
  `bil_c` int(11) NOT NULL DEFAULT '0',
  `bank` float NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_nap`
--

CREATE TABLE `db_nap` (
  `id` int(11) NOT NULL,
  `user_id` int(13) NOT NULL,
  `login` varchar(55) NOT NULL,
  `date` int(13) NOT NULL,
  `summa` float NOT NULL,
  `win` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_news`
--

CREATE TABLE `db_news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `news` text NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_payeer_insert`
--

CREATE TABLE `db_payeer_insert` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_payment`
--

CREATE TABLE `db_payment` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purse` varchar(20) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `comission` double NOT NULL DEFAULT '0',
  `valuta` varchar(3) NOT NULL DEFAULT 'RUB',
  `serebro` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `pay_sys` varchar(100) NOT NULL DEFAULT '0',
  `pay_sys_id` int(11) NOT NULL DEFAULT '0',
  `response` int(1) NOT NULL DEFAULT '0',
  `payment_id` int(11) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_paymentss`
--

CREATE TABLE `db_paymentss` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purse` varchar(20) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `comission` double NOT NULL DEFAULT '0',
  `valuta` varchar(3) NOT NULL DEFAULT 'RUB',
  `serebro` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `pay_sys` varchar(100) NOT NULL DEFAULT '0',
  `pay_sys_id` int(11) NOT NULL DEFAULT '0',
  `response` int(1) NOT NULL DEFAULT '0',
  `payment_id` int(11) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_pay_dat`
--

CREATE TABLE `db_pay_dat` (
  `id` int(11) NOT NULL,
  `user` varchar(11) CHARACTER SET cp1251 NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_del` int(11) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `sum` double NOT NULL DEFAULT '0',
  `comission` double NOT NULL DEFAULT '0',
  `valuta` varchar(3) CHARACTER SET cp1250 NOT NULL DEFAULT 'RUB',
  `serebro` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `pay_sys` varchar(100) CHARACTER SET cp1250 NOT NULL DEFAULT '0',
  `pay_sys_id` int(11) NOT NULL DEFAULT '0',
  `response` int(1) NOT NULL DEFAULT '0',
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `db_pay_systems`
--

CREATE TABLE `db_pay_systems` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `first_char` varchar(3) NOT NULL,
  `comment` text NOT NULL,
  `min_pay` double NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп даних таблиці `db_pay_systems`
--

INSERT INTO `db_pay_systems` (`id`, `title`, `first_char`, `comment`, `min_pay`) VALUES
(1, 'Payeer', 'P', '4rfc5tyv6544uvb4678jb4tg r4ghtvr4 ryhgbre ryehr46yhehret6yh etberyed', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `db_qiwi_insert`
--

CREATE TABLE `db_qiwi_insert` (
  `id` int(11) NOT NULL,
  `user` varchar(10) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `sum` double NOT NULL DEFAULT '0',
  `vaycher` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_recovery`
--

CREATE TABLE `db_recovery` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ip` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_regkey`
--

CREATE TABLE `db_regkey` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `referer_id` int(11) NOT NULL DEFAULT '0',
  `referer_name` varchar(10) NOT NULL,
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_sell_items`
--

CREATE TABLE `db_sell_items` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `a_s` int(11) NOT NULL DEFAULT '0',
  `b_s` int(11) NOT NULL DEFAULT '0',
  `c_s` int(11) NOT NULL DEFAULT '0',
  `d_s` int(11) NOT NULL DEFAULT '0',
  `e_s` int(11) NOT NULL DEFAULT '0',
  `amount` double NOT NULL DEFAULT '0',
  `all_sell` int(11) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0',
  `f_s` int(11) NOT NULL DEFAULT '0',
  `g_s` int(11) NOT NULL DEFAULT '0',
  `h_s` int(11) NOT NULL DEFAULT '0',
  `j_s` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_sender`
--

CREATE TABLE `db_sender` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mess` text NOT NULL,
  `page` int(5) NOT NULL DEFAULT '0',
  `sended` int(7) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_stats`
--

CREATE TABLE `db_stats` (
  `id` int(11) NOT NULL,
  `all_users` int(11) NOT NULL DEFAULT '0',
  `all_payments` double NOT NULL DEFAULT '0',
  `all_insert` double NOT NULL DEFAULT '0',
  `donations` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_stats_btree`
--

CREATE TABLE `db_stats_btree` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user` varchar(10) NOT NULL,
  `tree_name` varchar(10) NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_swap_ser`
--

CREATE TABLE `db_swap_ser` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `amount_b` double NOT NULL DEFAULT '0',
  `amount_p` double NOT NULL DEFAULT '0',
  `date_add` int(11) NOT NULL DEFAULT '0',
  `date_del` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `db_users_b`
--

CREATE TABLE `db_users_b` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `money_b` double NOT NULL DEFAULT '0',
  `money_p` double NOT NULL DEFAULT '10',
  `a_t` int(11) NOT NULL DEFAULT '0',
  `b_t` int(11) NOT NULL DEFAULT '0',
  `c_t` int(11) NOT NULL DEFAULT '0',
  `d_t` int(11) NOT NULL DEFAULT '0',
  `e_t` int(11) NOT NULL DEFAULT '0',
  `a_b` int(11) NOT NULL DEFAULT '0',
  `b_b` int(11) NOT NULL DEFAULT '0',
  `c_b` int(11) NOT NULL DEFAULT '0',
  `d_b` int(11) NOT NULL DEFAULT '0',
  `e_b` int(11) NOT NULL DEFAULT '0',
  `all_time_a` int(11) NOT NULL DEFAULT '0',
  `all_time_b` int(11) NOT NULL DEFAULT '0',
  `all_time_c` int(11) NOT NULL DEFAULT '0',
  `all_time_d` int(11) NOT NULL DEFAULT '0',
  `all_time_e` int(11) NOT NULL DEFAULT '0',
  `last_sbor` int(11) NOT NULL DEFAULT '0',
  `from_referals` double NOT NULL DEFAULT '0',
  `to_referer` double NOT NULL DEFAULT '0',
  `payment_sum` double NOT NULL DEFAULT '0',
  `insert_sum` double NOT NULL DEFAULT '0',
  `ks` double NOT NULL DEFAULT '100',
  `f_t` int(11) NOT NULL DEFAULT '0',
  `all_time_f` int(11) NOT NULL DEFAULT '0',
  `f_b` int(11) NOT NULL DEFAULT '0',
  `g_t` int(11) NOT NULL DEFAULT '0',
  `all_time_g` int(11) NOT NULL DEFAULT '0',
  `g_b` int(11) NOT NULL DEFAULT '0',
  `h_t` int(11) NOT NULL DEFAULT '0',
  `all_time_h` int(11) NOT NULL DEFAULT '0',
  `h_b` int(11) NOT NULL DEFAULT '0',
  `j_t` int(11) NOT NULL DEFAULT '0',
  `all_time_j` int(11) NOT NULL DEFAULT '0',
  `j_b` int(11) NOT NULL DEFAULT '0',
  `purse` varchar(12) NOT NULL DEFAULT '0',
  `wheel` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп даних таблиці `db_users_b`
--

INSERT INTO `db_users_b` (`id`, `user`, `money_b`, `money_p`, `a_t`, `b_t`, `c_t`, `d_t`, `e_t`, `a_b`, `b_b`, `c_b`, `d_b`, `e_b`, `all_time_a`, `all_time_b`, `all_time_c`, `all_time_d`, `all_time_e`, `last_sbor`, `from_referals`, `to_referer`, `payment_sum`, `insert_sum`, `ks`, `f_t`, `all_time_f`, `f_b`, `g_t`, `all_time_g`, `g_b`, `h_t`, `all_time_h`, `h_b`, `j_t`, `all_time_j`, `j_b`, `purse`, `wheel`) VALUES
(1, '111111', 100, 10, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1571419248, 0, 0, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'P8888888', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `tb_aukcion_game`
--

CREATE TABLE `tb_aukcion_game` (
  `id` int(11) NOT NULL,
  `user` varchar(150) NOT NULL,
  `date` int(11) NOT NULL,
  `timers` int(11) NOT NULL,
  `among` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `tb_aukcion_game_stats`
--

CREATE TABLE `tb_aukcion_game_stats` (
  `id` int(11) NOT NULL,
  `user` varchar(150) NOT NULL,
  `date` int(11) NOT NULL,
  `among` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблиці `wmrush_pin`
--

CREATE TABLE `wmrush_pin` (
  `id` int(11) NOT NULL,
  `pin` varchar(55) NOT NULL,
  `summa` double NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `wmrush_stats_fortuna`
--

CREATE TABLE `wmrush_stats_fortuna` (
  `id` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `sum` varchar(55) NOT NULL,
  `date` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `al_polzov_a`
--
ALTER TABLE `al_polzov_a`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `ip` (`ip`);

--
-- Індекси таблиці `db_advpic`
--
ALTER TABLE `db_advpic`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_bonus_list`
--
ALTER TABLE `db_bonus_list`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_chat`
--
ALTER TABLE `db_chat`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_competition`
--
ALTER TABLE `db_competition`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_competition_users`
--
ALTER TABLE `db_competition_users`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_conabrul`
--
ALTER TABLE `db_conabrul`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_confligsg`
--
ALTER TABLE `db_confligsg`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_games_knb`
--
ALTER TABLE `db_games_knb`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_games_wheel`
--
ALTER TABLE `db_games_wheel`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_insert_money`
--
ALTER TABLE `db_insert_money`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_lottery`
--
ALTER TABLE `db_lottery`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_lottery_winners`
--
ALTER TABLE `db_lottery_winners`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_nap`
--
ALTER TABLE `db_nap`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_news`
--
ALTER TABLE `db_news`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_payeer_insert`
--
ALTER TABLE `db_payeer_insert`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_payment`
--
ALTER TABLE `db_payment`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_paymentss`
--
ALTER TABLE `db_paymentss`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_pay_systems`
--
ALTER TABLE `db_pay_systems`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_qiwi_insert`
--
ALTER TABLE `db_qiwi_insert`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_recovery`
--
ALTER TABLE `db_recovery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ip` (`ip`);

--
-- Індекси таблиці `db_regkey`
--
ALTER TABLE `db_regkey`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Індекси таблиці `db_sell_items`
--
ALTER TABLE `db_sell_items`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_sender`
--
ALTER TABLE `db_sender`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_stats`
--
ALTER TABLE `db_stats`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_stats_btree`
--
ALTER TABLE `db_stats_btree`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_swap_ser`
--
ALTER TABLE `db_swap_ser`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `db_users_b`
--
ALTER TABLE `db_users_b`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tb_aukcion_game`
--
ALTER TABLE `tb_aukcion_game`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tb_aukcion_game_stats`
--
ALTER TABLE `tb_aukcion_game_stats`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `wmrush_pin`
--
ALTER TABLE `wmrush_pin`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `wmrush_stats_fortuna`
--
ALTER TABLE `wmrush_stats_fortuna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `al_polzov_a`
--
ALTER TABLE `al_polzov_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `db_advpic`
--
ALTER TABLE `db_advpic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_bonus_list`
--
ALTER TABLE `db_bonus_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_chat`
--
ALTER TABLE `db_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_competition`
--
ALTER TABLE `db_competition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_competition_users`
--
ALTER TABLE `db_competition_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_conabrul`
--
ALTER TABLE `db_conabrul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `db_confligsg`
--
ALTER TABLE `db_confligsg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `db_games_knb`
--
ALTER TABLE `db_games_knb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_games_wheel`
--
ALTER TABLE `db_games_wheel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_insert_money`
--
ALTER TABLE `db_insert_money`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_lottery`
--
ALTER TABLE `db_lottery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_lottery_winners`
--
ALTER TABLE `db_lottery_winners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_nap`
--
ALTER TABLE `db_nap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_news`
--
ALTER TABLE `db_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_payeer_insert`
--
ALTER TABLE `db_payeer_insert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_payment`
--
ALTER TABLE `db_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_paymentss`
--
ALTER TABLE `db_paymentss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_pay_systems`
--
ALTER TABLE `db_pay_systems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблиці `db_qiwi_insert`
--
ALTER TABLE `db_qiwi_insert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_recovery`
--
ALTER TABLE `db_recovery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_regkey`
--
ALTER TABLE `db_regkey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_sell_items`
--
ALTER TABLE `db_sell_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_sender`
--
ALTER TABLE `db_sender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_stats`
--
ALTER TABLE `db_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_stats_btree`
--
ALTER TABLE `db_stats_btree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `db_swap_ser`
--
ALTER TABLE `db_swap_ser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `tb_aukcion_game`
--
ALTER TABLE `tb_aukcion_game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `tb_aukcion_game_stats`
--
ALTER TABLE `tb_aukcion_game_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `wmrush_pin`
--
ALTER TABLE `wmrush_pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `wmrush_stats_fortuna`
--
ALTER TABLE `wmrush_stats_fortuna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
