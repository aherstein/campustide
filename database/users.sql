--
-- PostgreSQL database dump
--

SET client_encoding = 'LATIN1';
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: users; Type: TABLE; Schema: public; Owner: campustide; Tablespace: 
--

CREATE TABLE users (
    user_id integer DEFAULT nextval('users_user_id_seq'::regclass) NOT NULL,
    email text NOT NULL,
    "password" text NOT NULL,
    name text,
    "admin" boolean DEFAULT false NOT NULL,
    address text,
    address2 text,
    city text,
    state text,
    zip text,
    about text,
    active boolean DEFAULT true NOT NULL,
    type_id integer,
    created_date timestamp without time zone DEFAULT now() NOT NULL,
    profile_img text,
    password_reset_hash text,
    url text,
    ip_address text,
    school_id integer,
    phone text
);


ALTER TABLE public.users OWNER TO campustide;

--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: campustide; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (user_id);


--
-- PostgreSQL database dump complete
--

