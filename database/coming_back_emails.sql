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
-- Name: coming_back_emails; Type: TABLE; Schema: public; Owner: campustide; Tablespace: 
--

CREATE TABLE coming_back_emails (
    id serial NOT NULL,
    email text NOT NULL
);


ALTER TABLE public.coming_back_emails OWNER TO campustide;

--
-- Name: coming_back_emails_email_key; Type: CONSTRAINT; Schema: public; Owner: campustide; Tablespace: 
--

ALTER TABLE ONLY coming_back_emails
    ADD CONSTRAINT coming_back_emails_email_key UNIQUE (email);


--
-- Name: coming_back_emails_pkey; Type: CONSTRAINT; Schema: public; Owner: campustide; Tablespace: 
--

ALTER TABLE ONLY coming_back_emails
    ADD CONSTRAINT coming_back_emails_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

