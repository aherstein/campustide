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
-- Name: events; Type: TABLE; Schema: public; Owner: campustide; Tablespace: 
--

CREATE TABLE events (
    event_id integer DEFAULT nextval('events_event_id_seq'::regclass) NOT NULL,
    school_id integer,
    user_id integer,
    name text,
    description text,
    startdate timestamp without time zone,
    enddate timestamp without time zone,
    active boolean,
    "location" text,
    created_date timestamp without time zone DEFAULT now() NOT NULL,
    event_img text,
    address text,
    address2 text,
    city text,
    state text,
    zip text
);


ALTER TABLE public.events OWNER TO campustide;

--
-- Name: events_pkey; Type: CONSTRAINT; Schema: public; Owner: campustide; Tablespace: 
--

ALTER TABLE ONLY events
    ADD CONSTRAINT events_pkey PRIMARY KEY (event_id);


--
-- PostgreSQL database dump complete
--

