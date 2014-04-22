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
-- Name: additional_schools; Type: TABLE; Schema: public; Owner: campustide; Tablespace: 
--

CREATE TABLE additional_schools (
    user_id integer NOT NULL,
    school_id integer NOT NULL
);


ALTER TABLE public.additional_schools OWNER TO campustide;

--
-- PostgreSQL database dump complete
--

