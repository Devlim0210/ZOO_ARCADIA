--
-- PostgreSQL database dump
--

-- Dumped from database version 16.4 (Postgres.app)
-- Dumped by pg_dump version 16.4 (Postgres.app)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: pg_stat_statements; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pg_stat_statements WITH SCHEMA public;


--
-- Name: EXTENSION pg_stat_statements; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pg_stat_statements IS 'track planning and execution statistics of all SQL statements executed';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: animaux; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.animaux (
    id integer NOT NULL,
    prenom character varying(255),
    race character varying(255),
    age integer,
    sexe character varying(10),
    date_arrivee date
);


ALTER TABLE public.animaux OWNER TO postgres;

--
-- Name: animaux_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.animaux_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.animaux_id_seq OWNER TO postgres;

--
-- Name: animaux_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.animaux_id_seq OWNED BY public.animaux.id;


--
-- Name: avis; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.avis (
    id integer NOT NULL,
    nom character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    message text NOT NULL,
    date timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    valide boolean DEFAULT false
);


ALTER TABLE public.avis OWNER TO postgres;

--
-- Name: avis_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.avis_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.avis_id_seq OWNER TO postgres;

--
-- Name: avis_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.avis_id_seq OWNED BY public.avis.id;


--
-- Name: consultations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.consultations (
    id integer NOT NULL,
    animal_id integer,
    consultation_date date,
    etat_animal character varying(255),
    details text
);


ALTER TABLE public.consultations OWNER TO postgres;

--
-- Name: consultations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.consultations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.consultations_id_seq OWNER TO postgres;

--
-- Name: consultations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.consultations_id_seq OWNED BY public.consultations.id;


--
-- Name: contact; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.contact (
    id integer NOT NULL,
    nom character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    message text NOT NULL,
    date_contact timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.contact OWNER TO postgres;

--
-- Name: contact_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.contact_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.contact_id_seq OWNER TO postgres;

--
-- Name: contact_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.contact_id_seq OWNED BY public.contact.id;


--
-- Name: habitats; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.habitats (
    id integer NOT NULL,
    nom character varying(100) NOT NULL,
    description text NOT NULL,
    image character varying(255)
);


ALTER TABLE public.habitats OWNER TO postgres;

--
-- Name: habitats_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.habitats_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.habitats_id_seq OWNER TO postgres;

--
-- Name: habitats_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.habitats_id_seq OWNED BY public.habitats.id;


--
-- Name: nourriture; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.nourriture (
    id integer NOT NULL,
    animal_id integer,
    type_nourriture character varying(255),
    quantite integer,
    date_heure timestamp without time zone
);


ALTER TABLE public.nourriture OWNER TO postgres;

--
-- Name: nourriture_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.nourriture_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.nourriture_id_seq OWNER TO postgres;

--
-- Name: nourriture_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.nourriture_id_seq OWNED BY public.nourriture.id;


--
-- Name: services; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.services (
    id integer NOT NULL,
    nom character varying(255) NOT NULL,
    description text NOT NULL
);


ALTER TABLE public.services OWNER TO postgres;

--
-- Name: services_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.services_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.services_id_seq OWNER TO postgres;

--
-- Name: services_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.services_id_seq OWNED BY public.services.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    nom character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    password character varying(255) NOT NULL,
    role character varying(50) NOT NULL,
    date_creation timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: animaux id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.animaux ALTER COLUMN id SET DEFAULT nextval('public.animaux_id_seq'::regclass);


--
-- Name: avis id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.avis ALTER COLUMN id SET DEFAULT nextval('public.avis_id_seq'::regclass);


--
-- Name: consultations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consultations ALTER COLUMN id SET DEFAULT nextval('public.consultations_id_seq'::regclass);


--
-- Name: contact id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contact ALTER COLUMN id SET DEFAULT nextval('public.contact_id_seq'::regclass);


--
-- Name: habitats id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.habitats ALTER COLUMN id SET DEFAULT nextval('public.habitats_id_seq'::regclass);


--
-- Name: nourriture id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nourriture ALTER COLUMN id SET DEFAULT nextval('public.nourriture_id_seq'::regclass);


--
-- Name: services id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.services ALTER COLUMN id SET DEFAULT nextval('public.services_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: animaux; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.animaux (id, prenom, race, age, sexe, date_arrivee) FROM stdin;
1	Éléphant	Mammifère	\N	\N	\N
2	Lion	Mammifère	\N	\N	\N
3	Serpent	Reptile	\N	\N	\N
4	Éléphant	Mammifère	\N	\N	\N
5	Lion	Mammifère	\N	\N	\N
6	Serpent	Reptile	\N	\N	\N
\.


--
-- Data for Name: avis; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.avis (id, nom, email, message, date, valide) FROM stdin;
2	g	ftr.henintsoa@gmail.com	hihih	2024-09-11 21:07:44	t
3	g	ftr.henintsoa@gmail.com	hihih	2024-09-11 21:36:54	t
5	eleonore	eleonore@gmail.com	Ras	2024-09-18 07:35:38	t
4	kamkam	kam@gmail.com	Du jamais vu	2024-09-21 16:41:53.069897	f
\.


--
-- Data for Name: consultations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.consultations (id, animal_id, consultation_date, etat_animal, details) FROM stdin;
1	2	2024-08-28	malade	ras
\.


--
-- Data for Name: contact; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.contact (id, nom, email, message, date_contact) FROM stdin;
1	yasmine	yasmine@gmail.com	bonjour je voudrais avoir quelques details concernant le petit train?	2024-09-18 10:45:10
2	yas	yasmine@gmail.com	hello	2024-09-18 11:58:13
3	eleonore	ftr.henintsoa@gmail.com	dddddd	2024-09-21 16:02:01.772256
4	pataya	pataya@gmail.com	ok	2024-09-21 16:03:21.970725
5	basptiste	baptiste@gmail.com	Je pourrais avoir le prix d&#039;entrée svp	2024-09-21 16:42:58.279862
\.


--
-- Data for Name: habitats; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.habitats (id, nom, description, image) FROM stdin;
1	Savane	Découvrez la savane africaine avec ses lions, girafes et éléphants.	savane.jpg
2	Jungle	La jungle tropicale abrite des singes, des oiseaux et des reptiles fascinants.	jungle.jpg
3	Marais	Les marais sont le refuge des crocodiles, tortues et grenouilles.	marais.jpg
\.


--
-- Data for Name: nourriture; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.nourriture (id, animal_id, type_nourriture, quantite, date_heure) FROM stdin;
\.


--
-- Data for Name: services; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.services (id, nom, description) FROM stdin;
2	Restauration	Découvrez notre offre de restauration bio et locale, avec des options végétariennes et véganes.
3	Visite guidée	Explorez le zoo avec nos guides experts et apprenez-en plus sur les animaux et leurs habitats.
4	Petit train	Faites le tour du zoo sans effort grâce à notre petit train, idéal pour découvrir les animaux tout en se relaxant.
1	xsxsxs	ballll
5	Poussette	Locatiion de poussette
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, nom, email, password, role, date_creation) FROM stdin;
1	Administrateur	utilisateur@zooarcadia.com	$2y$10$YwA5zmf5U8TsRbcq3LHehecpwZEw4pbO4XQIAEqyKMr02sy3OW4Ni	admin	2024-09-18 09:15:04
2	Employé	employe@zooarcadia.com	$2y$10$PZY.d7FIAVJAshaNK8JKH.o8Z.2p8IYWWZUchUFrh16gmqgnHj6Ui	employé	2024-09-19 19:56:01
3	Vétérinaire	veterinaire@zooarcadia.com	$2y$10$KLQuy0YuscGhNzWszP7Y7e2LqVcIGE05FOI2k0AH07njF7vAJzFhm	vétérinaire	2024-09-19 19:56:01
4	meydon	meydon@gmail.com	$2y$10$vnGmNf4AMZFLrfaqvNaXmeF5M36GdTUD23h8MHvlFFPV6gmAlPMQe	employe	2024-09-20 16:47:23
5	Samyok	samyok@gmail.com	$2y$10$6Sl83ErcFwilxlY/WlJdH.4Jb8Oxueddag.y.Ruy4tU8klX164/mO	veterinaire	2024-09-20 17:10:58
6	Kevin	kevin@gmail.com	kebvin	employe	2024-09-21 12:20:05.735573
7	fetra	fetra@gmail.com	$2y$10$B3Cz8iV5lD9ikMvVaCjkF.NfqtacC8qYUUirsYKlB2BLXipV/.5D2	veterinaire	2024-09-21 12:24:15.360695
\.


--
-- Name: animaux_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.animaux_id_seq', 6, true);


--
-- Name: avis_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.avis_id_seq', 4, true);


--
-- Name: consultations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.consultations_id_seq', 1, false);


--
-- Name: contact_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.contact_id_seq', 5, true);


--
-- Name: habitats_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.habitats_id_seq', 3, true);


--
-- Name: nourriture_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.nourriture_id_seq', 1, false);


--
-- Name: services_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.services_id_seq', 5, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 7, true);


--
-- Name: animaux animaux_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.animaux
    ADD CONSTRAINT animaux_pkey PRIMARY KEY (id);


--
-- Name: avis avis_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.avis
    ADD CONSTRAINT avis_pkey PRIMARY KEY (id);


--
-- Name: consultations consultations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consultations
    ADD CONSTRAINT consultations_pkey PRIMARY KEY (id);


--
-- Name: contact contact_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contact
    ADD CONSTRAINT contact_pkey PRIMARY KEY (id);


--
-- Name: habitats habitats_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.habitats
    ADD CONSTRAINT habitats_pkey PRIMARY KEY (id);


--
-- Name: nourriture nourriture_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nourriture
    ADD CONSTRAINT nourriture_pkey PRIMARY KEY (id);


--
-- Name: services services_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.services
    ADD CONSTRAINT services_pkey PRIMARY KEY (id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: consultations fk_animal; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consultations
    ADD CONSTRAINT fk_animal FOREIGN KEY (animal_id) REFERENCES public.animaux(id);


--
-- Name: nourriture fk_animal; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nourriture
    ADD CONSTRAINT fk_animal FOREIGN KEY (animal_id) REFERENCES public.animaux(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

