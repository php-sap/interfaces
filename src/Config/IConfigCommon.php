<?php

namespace phpsap\interfaces\Config;

/**
 * Interface IConfig
 *
 * Interface to configure basic connection parameters for SAP remote function calls,
 * that are common to both connection types (A, and B)
 *
 * @package phpsap\interfaces
 * @author  Gregor J.
 * @license MIT
 */
interface IConfigCommon extends IConfiguration
{
    /**
     * Define trace levels 0-3.
     */
    const TRACE_OFF     = 0;
    const TRACE_BRIEF   = 1;
    const TRACE_VERBOSE = 2;
    const TRACE_FULL    = 3;

    /**
     * If the connection needs to be made through a firewall using a SAPRouter,
     * specify the SAPRouter parameters in the following format:
     * /H/hostname/S/portnumber/H/
     */
    const JSON_SAPROUTER = 'saprouter';

    /**
     * The trace level (0-3). See constants TRACE_*.
     */
    const JSON_TRACE = 'trace';

    /**
     * Only needed it if you want to connect to a non-Unicode backend using a
     * non-ISO-Latin-1 user name or password. The RFC library will then use that
     * codepage for the initial handshake, thus preserving the characters in
     * username/password.
     */
    const JSON_CODEPAGE = 'codepage';

    /**
     * The username to use for authentication.
     */
    const JSON_USER = 'user';

    /**
     * The password to use for authentication.
     */
    const JSON_PASSWD = 'passwd';

    /**
     * The destination in RfcOpen.
     */
    const JSON_CLIENT = 'client';

    /**
     * The logon language.
     */
    const JSON_LANG = 'lang';

    /**
     * The destination in RfcOpenConnection.
     */
    const JSON_DEST = 'dest';

    /**
     * In case the connection needs to be made through a firewall using a SAPRouter,
     * the parameters are in the following format:
     * /H/hostname/S/portnumber/H/
     * @return string the saprouter
     */
    public function getSaprouter();

    /**
     * In case the connection needs to be made through a firewall using a SAPRouter,
     * specify the SAPRouter parameters in the following format:
     * /H/hostname/S/portnumber/H/
     * @param string $saprouter The saprouter configuration parameter.
     * @return IConfigCommon
     */
    public function setSaprouter($saprouter);

    /**
     * Get the trace level (0-3). See constants TRACE_*.
     * @return int the trace level
     */
    public function getTrace();

    /**
     * Set the trace level (0-3). See constants TRACE_*.
     * @param int $trace The trace level.
     * @return IConfigCommon
     */
    public function setTrace($trace);

    /**
     * Only needed it if you want to connect to a non-Unicode backend using a
     * non-ISO-Latin-1 user name or password. The RFC library will then use that
     * codepage for the initial handshake, thus preserving the characters in
     * username/password.
     * @return int the codepage
     */
    public function getCodepage();

    /**
     * Only needed it if you want to connect to a non-Unicode backend using a
     * non-ISO-Latin-1 user name or password. The RFC library will then use that
     * codepage for the initial handshake, thus preserving the characters in
     * username/password.
     * @param int $codepage The codepage.
     * @return IConfigCommon
     */
    public function setCodepage($codepage);

    /**
     * Get the username to use for authentication.
     * @return string the username
     */
    public function getUser();

    /**
     * Set the username to use for authentication.
     * @param string $user The username.
     * @return IConfigCommon
     */
    public function setUser($user);

    /**
     * Get the password to use for authentication.
     * @return string the password
     */
    public function getPasswd();

    /**
     * Get the password to use for authentication.
     * @param string $passwd The password.
     * @return IConfigCommon
     */
    public function setPasswd($passwd);

    /**
     * Get the destination in RfcOpen.
     * @return string Get the destination in RfcOpen.
     */
    public function getClient();

    /**
     * Set the destination in RfcOpen.
     * @param string $client The destination in RfcOpen.
     * @return IConfigCommon
     */
    public function setClient($client);

    /**
     * Get the logon Language.
     * @return string The logon language.
     */
    public function getLang();

    /**
     * Set the logon Language.
     * @param string $lang The logon language.
     * @return IConfigCommon
     */
    public function setLang($lang);

    /**
     * Get the destination in RfcOpenConnection.
     * @return string the logon language
     */
    public function getDest();

    /**
     * Set the destination in RfcOpenConnection.
     * @param string $dest The destination in RfcOpenConnection.
     * @return IConfigCommon
     */
    public function setDest($dest);
}
