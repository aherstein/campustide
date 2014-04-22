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
-- Name: types; Type: TABLE; Schema: public; Owner: campustide; Tablespace: 
--

CREATE TABLE types (
    type_id integer DEFAULT nextval('types_type_id_seq'::regclass) NOT NULL,
    description text,
    description_plural text
);


ALTER TABLE public.types OWNER TO campustide;

--
-- Name: types_pkey; Type: CONSTRAINT; Schema: public; Owner: campustide; Tablespace: 
--

ALTER TABLE ONLY types
    ADD CONSTRAINT types_pkey PRIMARY KEY (type_id);


--
-- PostgreSQL database dump complete
--

