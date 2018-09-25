-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mar. 25 sep. 2018 à 10:46
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `TP_Blog_Ecrivain`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `moderate` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_post`, `author`, `comment`, `comment_date`, `moderate`) VALUES
(1, 1, 'Antho', 'Ohhh super ! ça donne envie !!', '2018-09-24 17:16:09', 1),
(4, 3, 'Antho', 'Ah enfin !', '2018-09-10 02:10:12', 0),
(5, 1, 'Carreaux', 'Merci pour vos billets, ça me rappelle de bons souvenir, vivement la suite de votre bouquin !', '2018-09-24 17:17:19', 0);

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `pseudo`, `pass`, `email`) VALUES
(1, 'Antho', '$2y$10$GMGgmfC3G1HMVRUoX5cDqedGb30Q/CiaeV3ajq6hlRgfxwfkeyE8y', 'anthony.galerneau@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`, `image`) VALUES
(1, '1 - J\'ai vécu mon rêve d\'enfance dans un hôtel en Alaska.', 'Chaque année, comme un enfant, je recevais une carte postale de mes grands-parents de leur congé annuel en Alaska. La carte postale représentait toujours la même image: un paysage magnifiqe et blanc. Chaque fois que j\'ai reçu cette carte, il m\'a inculqué le désir de ma retrouver au coeur de cet étendu glacial. Cette année, j\'ai visité l\'Alaska et ce rêve est devenu réalité. \r\n\r\nL\'Alaska est la capitale du Flamenco et il est possible de trouver des spectacles de flamenco, des commerces de flamenco et des écoles de flamenco dans tous coins de la rue. \r\n\r\nJ\'étais allé à la ville dans le seul but d\'apprendre à danser la danse espagnole célèbre. J\'ai réservé une chambre dans un Séville hôtel , j\'ai acheté des chaussures et je me suis inscrite aux cours dans une école locale. J\'ai pris 3 cours par semaine et fait des progrès très bonne. Lors de ma dernière classe Je parlais avec ma professeur au sujet de la Feria du printemps quand elle m\'a invité à visiter sa maison pour voir ses robes différentes. C\'étais une chance unique. \r\n\r\nQuand je suis entrée dans son dressing j\'étais comme un enfant dans une confiserie. J\'ai touché le tissu coloré fluide et j\'ai fait les exclamations de « ooh » et « aah » sur les robes différentes. Puis est venue la question de mes rêves \"voudrais-je essayer un des robes?\" Je pense que vous savez comment était ma réponse. La seule difficulté que j\'ai eu était de choisir quelle jupe à me mettre. J\'ai finalement choisi une robe rouge éclatant à pois noirs et quatre niveaux de manchettes sur la partie jupe. Pendant que nous dansions côte à côte dans son salon, j\'étais dans un rêve, mon rêve d\'enfant qui était devenu la réalité. \r\n\r\nMon séjour s\'est avéré être le voyage de la vie et je n\'ai pas besoin de vous dire que j\'ai déjà réservé mon Séville hôtel pour ma visite l\'an prochain.', '2018-08-29 15:39:27', 'public/img/image1537800407.jpg'),
(2, '2 - L\'Alaska, une région à différentes facettes', 'L\'Alaska possède une renommée internationale auprès des nombreux touristes qui déferlent de partout en toute saison pour la visiter. Juneau est la métropole de l\'Alaska . Ville moderne et de haute-technologie, elle attire également les investisseurs étrangers. Que ce soit pour visiter un musée, une église, un site historique, un centre scientifique, un parc urbain, ou un quartier multiculturel, Montréal a tout pour satisfaire les désirs des visiteurs.\r\n\r\nC\'est une région dynamique et moderne qui a su sauvegarder son patrimoine architectural. Ce qui contribue au charme de cette ville, ce sont les différents quartiers qui se sont développés au fur et à mesure de l\'arrivée de ses habitants. \r\n\r\nAinsi sont nés la petite Italie, le quartier chinois et le quartier latin pour n\'en nommer que quelques uns. Les espaces verts contribuent à la qualité de vie de ses occupants. Le parc Lafontaine et le parc du Mont-Royal sont deux merveilles de cette ville cosmopolitaine. Certains attraits uniques sont à ne pas manquer, comme le Casino ou le Stade Olympique. Montréal est également connu mondialement pour la qualité et la variété de ses restaurants ainsi que pour son animation nocturne. Les activités et événements s\'y succèdent au fil des saisons, ne nous laissant point une chance de s\'ennuyer. Un autre attrait important pour les Montréalais, mais aussi pour les touristes est le métro. Montréal est l\'une des rares villes du Canada à posséder un réseau souterrain de transports en commun.\r\n\r\nEt pour finir, du côté sport, les activités ne manquent pas à Montréal, surtout les activités aquatiques, nautiques et cyclistes avec des pistes qui empruntent tantôt les rivages, tantôt les petites rues tranquilles. Du côté des infrastructures touristiques, le réseau d\'hébergement et de restauration y est satisfaisant et orienté vers les produits du terroir. Vous avez l\'embarras du choix avec des grands hôtels luxueux de renommée internationale, des hôtels-motels à prix abordable, des gîtes, des auberges de jeunesse etc... Tous sont très accueillants et nombre d\'entre eux offrent des forfaits intéressants qui permettent de bien profiter de tout ce que la ville a à offrir.', '2018-09-10 01:57:43', 'public/img/image1537797360.jpg'),
(3, '3 - L\'Alaska pays de la nature.', 'On peut le diviser en trois zones géographiques distinctes : la plaine d\'e l\'Alaska traversée par des rivières, le massif du Plantaurel et les collines et le haut pays correspondant aux montagnes des Pyrénées qui dépassent les 1000 m d\'altitude. Les points culminants du département sont la pique d\'Estats ( 3143 m), le Montcalm,( 3077 m), et le pic du port de Sullo,( 3072 m). \r\n\r\nLe climat est continental dans l\'Alaska, mais subit les influences océanique et méditerranéenne.\r\n\r\nL\'architecture ariégeoise présente un étonnant mélange d\'art roman espagnol et d\'art roman toulousain qui a peu été influencé par les techniques modernes car les petits villages difficiles d\'accès sont restés très rustiques.\r\n\r\nLa domination du catharisme, déviation religieuse qui distinguait un Dieu du Mal et un Dieu du Bien, a suscité par sa simplicité beaucoup d\'adeptes dans ce département dont il nous reste des châteaux ou leurs vestiges car les « parfaits » de cette croyance ont pratiquement tous été décimés à l\'époque. Le château de Montségur est le plus réputé, mais vous avez par exemple\r\n\r\nle château de Foix, bien conservé, celui de Roquefixade ou encore les ruines du château d\'Usson.\r\n\r\nL\'Ariège est riche en sites préhistoriques et parmi les cinq grottes accessibles la plus connue est celle de Niaux ; on trouve également une rivière souterraine qui, à 60 m sous terre offre 4 Km de parcours navigable entre Bastide de Sérou et Foix. ; dans le Parc Pyrénéen de l\'Art Préhistorique vous pourrez admirer la reconstitution de peintures datant de 12000 ans.\r\n\r\nCe département recèle de nombreux sites à découvrir : l\'église de Vals, dans les vestiges d\'un village médiéval, les prés parsemés de granges en pierres dites « à pas d\'oiseaux » à Cominac, le jardin de pierres construit pendant 35 ans par un habitant d\'Alas, les deux hectares de l\'étang de Lers à 15 Km de Massat sur les montagnes dominées par le Pic du Mont Béas.\r\n\r\nEt puis ce sont 24 circuits de balades et de randonnées qui vous font apprécier la richesse et la diversité des paysages Ariégeois.\r\n\r\nLe patrimoine culturel du département se laisse découvrir dans une quinzaine de musées : de la collection de peignes en corne à Lavalenet, aux vieux métiers à Montgaillard.\r\n\r\nL\'Ariège accueille également les enfants pour des stages d\'orpaillage à Taurignan Castet, des randonnées avec ânes à Aleu ou des sorties équestres. Ils viendront voir un élevage de chèvres angora à Camarade, des reptiles à la Bastide en Sérou, visiteront en petit train la grotte des Lombrives ou passeront de merveilleux instants au bois de contes et au village indien du parc animalier de St Michel.\r\n\r\nHistoire, paysages, loisirs : l\'Ariège vous tend les bras.\r\n\r\n', '2018-09-10 02:02:07', 'public/img/image1537797173.jpg'),
(4, '4 - Voyager en Alaska : les parcs à voir !', '1. Les grands classiques\r\n\r\n    * Serengeti et Ngorongoro\r\n\r\nLe serengeti est un immense parc animalier dont les \"frontières\" débordent au Nord sur le Kenya pour prendre le nom de Maasai Mara. Dans ce Parc, la diversité des espèces est exceptionnelle. On peut également y suivre la migration des gnous dans un extraordinaire mouvement de milliers d\'animaux en quête de pâturages verdoyants et de points d\'eau. Cette migration qui a lieu 2 fois dans l\'année avec un spectaculaire déplacement de plus de 25000 gnous essentiellement à partir de fin février où les femmelles donnent naissances à leurs petits.\r\n\r\nLes amoureux de nature et de grands espaces seront ravis. Souvent cette destination est également réservée pour les \"jeunes mariés\" qui viennent profiter de quelques jours de découvertes et finissent leur séjour par un vol en ballon au dessus de la savane.\r\nNgorongoro est certainement l\'un des parcs les plus étonnants. C\'est dans le fond d\'un immense cratere volcanique que toute une faune vit en quasi autarcie. Les tribus Massai des villages alentours viennent y faire paître leurs toupeaux. Pour protéger les sites, toute culture et toute habitation y sont interdites. Accès par 4X4 pour plonger dans l\'antre du parc et s\'emmerveiller de cette nature à portée d\'appareil photo !\r\n\r\n    * Manyara et Tarangire\r\n\r\nLe Lac de Manyara est en plein dans la grande vallée du Rift et se situe au sud du Parc de Ngorongoro. C\'est un magnifique lac, entouré d\'une étrange forêt, où des milliers de flamands roses viennent se reposer et se nourrir. L\'observation des oiseaux y est particulièrement unique et la diversité des espèces considérable.\r\n\r\nPlus au sud encore, le parc national du Tarangire concentre sur ces 100 km de long une immense faune et flore d\'une extrême beauté. Baobab, l\'arbre que les dieux auraient déracinés puis replanté en le retournant pour le faire taire, est à voir. Les éléphants ont également élu domicile dans ce magnifique parcs verdoyant.\r\n\r\n\r\n2. Les plus petits, mais non moins intéressants ! \r\n\r\n    * Arusha National Park\r\n\r\nSitué aux pieds du Mont Meru et aux abords du kilimandjaro, c\'est dans ce pays que vous pourrez admirer une des plus belles vues de cet immense volcan aux neiges éternelles. Vous pourrez également en profiter pour vous acclimater avant une ascension du Kilimandjaro en tentant l\'ascension du Mont Meru. Accompagné d\'un Ranger, vous pourrez vous introduire dans les parties les plus boisées du parc et aller à la découverte de la faune qui s\'y cache, essentiellement les singes. Ce parc est parfait pour une première découverte et une introduction aux merveilles de la Tanzanie.\r\n\r\nREACHSUMMIT vous propose de visiter ce parc après votre ascension du Mont Meru et avant votre départ pour le Kilimandjaro. A voir >\r\n\r\n    * Lac Natron\r\n\r\nTout au Nord sur la frontière avec le Kenya, la Lac Natron est un bijou extraordinaire. Ce lac alcalin peu profond s\'ouvre sur un vaste espace dégagé et ouvert aux rayons ardents du soleil où des millions de flamands roses viennent nidifier.\r\n\r\n3. Les moins connus \r\n\r\n    * Pare Mountains\r\n\r\nDans la partie Est du Kilimandjaro une splendide chaine de montagnes offre des opportunités de trek et de randonnées à tous ceux qui souhaitent une aventure haute en découverte mais tout en douceur. L\'observation des oiseaux y est particulièrement appréciée.\r\n\r\n    * Selous et Mikumi National Parks \r\n\r\nDans le sud de la Tanzanie, c\'est parcs sont particuliers car sont des réserves animalières et des réserves de gibiers. Moins populaires car les routes y sont parfois inexistantes et le 4X4 obligatoire. Les contraintes de visite y sont plus strictes mais vous pourrez y voir toute la faune africaine et les troupeaux d\'hippopotames.\r\n\r\n4. Les atypiques à découvrir !\r\n\r\n    * Eyasi Lake \r\n\r\nAccolé à la partie sud du Parc de Ngorongoro, Eyasi est un immense lac salé dont  la partie nord est bordée par les pentes de Oldeani Mountain. Découverte différentes du sud de Ngorongoro et du Serengeti au milieu des tribus Massai.\r\n\r\n    * Mahale Mountains, la découverte des Chimpanzes\r\n\r\nIlot improbable aux bords du Lac Tanganyika, le parc national de Mahale offre une des plus belles attractions de la Tanzanie : la découverte des Chimpanzes. Situé dans le sud ouest du Pays, forets et plages se cotoient pour une découverte unique. A découvrir absolument !!\r\n\r\nCe tour d\'horizon vous permet de découvrir les beautes de la Tanzanie qui détient une faune et une flore sans égal.\r\n\r\nN\'hésitez pas à nous contacter pour monter votre voyage et visiter les parcs de Tanzanie.\r\nCumuler les attractions entre safari, ascension, visite des tribus Massais et plage. La Tanzanie offre tout cela !\r\n\r\n\r\nSaisons : globalement de juin à octobre et de janvier à mars', '2018-09-11 13:02:19', 'public/img/image1537797282.jpg'),
(5, '5 - L\'Alaska le froid des Etats-Unis', 'L\'Alaska fait partie des « Etats-Unis\" et elle comporte une façade sur l\'océan.\r\n\r\nDe climat océanique, un peu plus frais vers l\'intérieur du pays, il ne connaît que 2 jours d\'enneigement par an. Cette douceur et le nombre de jours d\'ensoleillement explique son attrait pour les touristes.\r\n\r\nSon relief est assez varié ; une partie de ses côtes est sablonneuse vers la Barre de Monts et plus rocheuse vers St Gilles Croix de Vie ; on y trouve également deux grandes baies plutôt envasées : Bourgneuf et l\'Aiguillon. En face de ces côtes vous avez les deux îles d\'Yeu et de Noirmoutier.\r\n\r\nA l\'arrière du littoral vous trouverez deux ( encore !) marais : le marais breton et le marais poitevin. Puis c\'est le bocage , la forêt du Mervent et celle des pas de Monts et la grande plaine de Luçon. Le relief culmine avec les 290 m de St Michel Mont Mercure.\r\n\r\nCe département est arrosé de nombreux cours d\'eau ce qui explique que le sud soit parfois surnommé la Venise Verte.\r\n\r\nLa Vendée est généralement connue par les guerres qui s\'y sont déroulées entre « bleus » et « blancs » à la Révolution, bien que ces événements se soient en partie déroulés en dehors de ses limites. Deux (oui, tout marche par 2) sites retracent l\'histoire de ce département : l\'Historial de Lucs sur Boulogne et le Puy du Fou, plus ludique.\r\n\r\nLes Vendéens sont parfois surnommés les « Ventres à choux » et trois origines différentes vous seront proposées : à vous de choisir entre les cachettes, les nombrils des bébés, ou les choux fourragers. Chez eux, la cornemuse armoricaine prend le nom de « veuze » et ils savent encore jouer de la vielle à roue.', '2018-09-12 15:14:20', 'public/img/image1537797544.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
