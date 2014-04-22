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
-- Name: schools; Type: TABLE; Schema: public; Owner: campustide; Tablespace: 
--

CREATE TABLE schools (
    school_id integer DEFAULT nextval('schools_school_id_seq'::regclass) NOT NULL,
    name text,
    address text,
    city text,
    state text,
    zip text
);


ALTER TABLE public.schools OWNER TO campustide;

--
-- Name: schools_pkey; Type: CONSTRAINT; Schema: public; Owner: campustide; Tablespace: 
--

ALTER TABLE ONLY schools
    ADD CONSTRAINT schools_pkey PRIMARY KEY (school_id);


--
-- Name: check_school; Type: TRIGGER; Schema: public; Owner: campustide
--

CREATE TRIGGER check_school
    BEFORE DELETE ON schools
    FOR EACH ROW
    EXECUTE PROCEDURE check_school();

ALTER TABLE schools DISABLE TRIGGER check_school;


--
-- PostgreSQL database dump complete
--

