<?php
/**
 * File src/IConfig.php
 *
 * Basic configuration interface.
 *
 * @package interfaces
 * @author  Gregor J.
 * @license MIT
 */

namespace phpsap\interfaces;

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
interface IConfig
{
    /**
     * If the connection needs to be made through a firewall using a SAPRouter,
     * specify the SAPRouter parameters in the following format:
     * /H/hostname/S/portnumber/H/
     * @return string the saprouter
     */
    public function getSaprouter();

    /**
     * Get the trace level (0-3)
     * @return int the trace level
     */
    public function getTrace();

    /**
     * Only needed it if you want to connect to a non-Unicode backend using a
     * non-ISO-Latin-1 user name or password. The RFC library will then use that
     * codepage for the initial handshake, thus preserving the characters in
     * username/password.
     *
     * @return int the codepage
     */
    public function getCodepage();

    /**
     * Get the username to use for authentication.
     * @return string the username
     */
    public function getUser();

    /**
     * Get the password to use for authentication.
     * @return string the password
     */
    public function getPasswd();

    /**
     * Get the destination in RfcOpen.
     * @return string Get the destination in RfcOpen.
     */
    public function getClient();

    /**
     * Get the logon Language.
     * @return string the logon language
     */
    public function getLang();

    /**
     * Get the destination in RfcOpenConnection.
     * @return string the logon language
     */
    public function getDest();

    /**
     * Generate the type of configuration needed by the PHP module in order to
     * establish a connection to SAP.
     * @return mixed
     */
    public function generateConfig();
}
