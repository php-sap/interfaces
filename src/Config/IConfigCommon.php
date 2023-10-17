<?php

namespace phpsap\interfaces\Config;

use phpsap\interfaces\exceptions\IIncompleteConfigException;
use phpsap\interfaces\exceptions\IInvalidArgumentException;

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
    public const TRACE_OFF = 0;

    /**
     * Brief trace level.
     */
    public const TRACE_BRIEF = 1;

    /**
     * Verbose trace level.
     */
    public const TRACE_VERBOSE = 2;

    /**
     * Full trace level.
     */
    public const TRACE_FULL = 3;

    /**
     * The username to use for authentication.
     */
    public const JSON_USER = 'user';

    /**
     * The password to use for authentication.
     */
    public const JSON_PASSWD = 'passwd';

    /**
     * The destination in RfcOpen.
     */
    public const JSON_CLIENT = 'client';

    /**
     * If the connection needs to be made through a firewall using a SAPRouter,
     * specify the SAPRouter parameters in the following format:
     * /H/hostname/S/portnumber/H/
     */
    public const JSON_SAPROUTER = 'saprouter';

    /**
     * The trace level (0-3). See constants TRACE_*.
     */
    public const JSON_TRACE = 'trace';

    /**
     * Only needed it if you want to connect to a non-Unicode backend using a
     * non-ISO-Latin-1 user name or password. The RFC library will then use that
     * codepage for the initial handshake, thus preserving the characters in
     * username/password.
     */
    public const JSON_CODEPAGE = 'codepage';

    /**
     * The logon language.
     */
    public const JSON_LANG = 'lang';

    /**
     * The destination in RfcOpenConnection.
     */
    public const JSON_DEST = 'dest';

    /**
     * Get the username to use for authentication.
     * @return string The username.
     * @throws IIncompleteConfigException
     */
    public function getUser();

    /**
     * Set the username to use for authentication.
     * @param  string  $user The username.
     * @return $this
     * @throws IInvalidArgumentException
     */
    public function setUser(string $user);

    /**
     * Get the password to use for authentication.
     * @return string The password.
     * @throws IIncompleteConfigException
     */
    public function getPasswd();

    /**
     * Set the password to use for authentication.
     * @param  string  $passwd The password.
     * @return $this
     * @throws IInvalidArgumentException
     */
    public function setPasswd(string $passwd);

    /**
     * Get the client.
     * @return string The client
     * @throws IIncompleteConfigException
     */
    public function getClient();

    /**
     * Set the client.
     * @param  string  $client The client.
     * @return $this
     * @throws IInvalidArgumentException
     */
    public function setClient(string $client);

    /**
     * Get the SAPRouter in case the connection needs to be made through a firewall.
     * @return string|null The saprouter or NULL in case the saprouter hasn't been set.
     */
    public function getSaprouter();

    /**
     * In case the connection needs to be made through a firewall using a SAPRouter,
     * specify the SAPRouter parameters in the following format:
     * /H/hostname/S/portnumber/H/
     * @param  string  $saprouter The saprouter.
     * @return $this
     * @throws IInvalidArgumentException
     */
    public function setSaprouter(string $saprouter);

    /**
     * Get the trace level. See constants TRACE_*.
     * @return int|null The trace level or NULL in case the trace level hasn't been set.
     */
    public function getTrace();

    /**
     * Set the trace level. See constants TRACE_*.
     * @param  int  $trace The trace level.
     * @return $this
     * @throws IInvalidArgumentException
     */
    public function setTrace(int $trace);

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
     * @param  int  $codepage The codepage.
     * @return $this
     * @throws IInvalidArgumentException
     */
    public function setCodepage(int $codepage);

    /**
     * Get the logon Language.
     * @return string|null The logon language or NULL in case the logon language hasn't been set.
     */
    public function getLang();

    /**
     * Set the logon language.
     * @param  string  $lang The logon language.
     * @return $this
     * @throws IInvalidArgumentException
     */
    public function setLang(string $lang);

    /**
     * Get the destination in RfcOpenConnection.
     * @return string|null The destination or NULL in case the destination hasn't been set.
     */
    public function getDest();

    /**
     * Set the destination in RfcOpenConnection.
     * @param  string  $dest The destination in RfcOpenConnection.
     * @return $this
     * @throws IInvalidArgumentException
     */
    public function setDest(string $dest);
}
