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
-- Name: school_views; Type: TABLE; Schema: public; Owner: campustide; Tablespace: 
--

CREATE TABLE school_views (
    view_id integer DEFAULT nextval('school_views_view_id_seq'::regclass) NOT NULL,
    school_id integer NOT NULL,
    ip_address text NOT NULL,
    date timestamp without time zone DEFAULT now() NOT NULL,
    "month" text,
    "year" text
);


ALTER TABLE public.school_views OWNER TO campustide;

--
-- Name: school_views_pkey; Type: CONSTRAINT; Schema: public; Owner: campustide; Tablespace: 
--

ALTER TABLE ONLY school_views
    ADD CONSTRAINT school_views_pkey PRIMARY KEY (view_id);


--
-- PostgreSQL database dump complete
--

