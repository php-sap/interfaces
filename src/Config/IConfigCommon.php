<?php

namespace phpsap\interfaces\Config;

/**
 * Interface IConfig
 *
 * Configure connection parameters for SAP remote function calls, that are common to
 * both connection types (A, and B).
 *
 * @package phpsap\interfaces\Config
 * @author  Gregor J.
 * @license MIT
 */
interface IConfigCommon extends IConfiguration
{
    /**
     * Disable tracing.
     */
    const TRACE_OFF = 0;

    /**
     * Brief trace level.
     */
    const TRACE_BRIEF = 1;

    /**
     * Verbose trace level.
     */
    const TRACE_VERBOSE = 2;

    /**
     * Full trace level.
     */
    const TRACE_FULL = 3;

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
     * The logon language.
     */
    const JSON_LANG = 'lang';

    /**
     * The destination in RfcOpenConnection.
     */
    const JSON_DEST = 'dest';

    /**
     * Get the username to use for authentication.
     * @return string The username.
     * @throws \phpsap\interfaces\exceptions\IIncompleteConfigException
     */
    public function getUser();

    /**
     * Set the username to use for authentication.
     * @param string $user The username.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setUser($user);

    /**
     * Get the password to use for authentication.
     * @return string The password.
     * @throws \phpsap\interfaces\exceptions\IIncompleteConfigException
     */
    public function getPasswd();

    /**
     * Set the password to use for authentication.
     * @param string $passwd The password.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setPasswd($passwd);

    /**
     * Get the client.
     * @return string The client
     * @throws \phpsap\interfaces\exceptions\IIncompleteConfigException
     */
    public function getClient();

    /**
     * Set the client.
     * @param string $client The client.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setClient($client);

    /**
     * Get the SAPRouter in case the connection needs to be made through a firewall.
     * @return string|null The saprouter or NULL in case the saprouter hasn't been set.
     */
    public function getSaprouter();

    /**
     * In case the connection needs to be made through a firewall using a SAPRouter,
     * specify the SAPRouter parameters in the following format:
     * /H/hostname/S/portnumber/H/
     * @param string $saprouter The saprouter.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setSaprouter($saprouter);

    /**
     * Get the trace level. See constants TRACE_*.
     * @return int|null The trace level or NULL in case the trace level hasn't been set.
     */
    public function getTrace();

    /**
     * Set the trace level. See constants TRACE_*.
     * @param int $trace The trace level.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setTrace($trace);

    /**
     * Only needed it if you want to connect to a non-Unicode backend using a
     * non-ISO-Latin-1 user name or password. The RFC library will then use that
     * codepage for the initial handshake, thus preserving the characters in
     * username/password.
     * @return int|null The codepage or NULL in case the codepage hasn't been set.
     */
    public function getCodepage();

    /**
     * Only needed it if you want to connect to a non-Unicode backend using a
     * non-ISO-Latin-1 user name or password. The RFC library will then use that
     * codepage for the initial handshake, thus preserving the characters in
     * username/password.
     * @param int $codepage The codepage.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setCodepage($codepage);

    /**
     * Get the logon Language.
     * @return string|null The logon language or NULL in case the logon language hasn't been set.
     */
    public function getLang();

    /**
     * Set the logon language.
     * @param string $lang The logon language.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setLang($lang);

    /**
     * Get the destination in RfcOpenConnection.
     * @return string|null The destination or NULL in case the destination hasn't been set.
     */
    public function getDest();

    /**
     * Set the destination in RfcOpenConnection.
     * @param string $dest The destination in RfcOpenConnection.
     * @return $this
     * @throws \phpsap\interfaces\exceptions\IInvalidArgumentException
     */
    public function setDest($dest);
}
