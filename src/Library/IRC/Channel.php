<?php

    /**
     * @package   PHP Bot
     * @author    hayander
     * @file      Channel.php
     * @created   2016-04-14 12:11
     */

    namespace Library\IRC;

    /**
     * Hold details such as user list of channels
     *
     * Class Channel
     * @package Library\IRC
     */
    class Channel
    {

        /**
         * Hold the correctly capitalised channel name
         * @var
         */
        private $channelName;

        /**
         * Hold the user list
         * @var
         */
        private $users;

        /**
         * Construct the channel class
         *
         * @param $channel
         */
        public function __construct($channel)
        {
            $this->channelName = $channel;
        }

        /**
         * Add a user to the user list of the channel
         *
         * @param $address
         */
        public function addUser($address)
        {
            $nick = strtolower($address['nick']);

            if (!isset($this->users[$nick]) || $this->users[$nick]['full'] == '') {
                $this->users[$nick] = $address;
            }
        }

        /**
         * Delete a user from the user list of the channel
         *
         * @param $nick
         */
        public function delUser($nick)
        {
            $nick = strtolower($nick);
            if (isset($this->users[$nick])) {
                unset($this->users[$nick]);
            }
        }

        public function clearUsers()
        {
            $this->users = array();
        }

        public function getUsers()
        {
            return $this->users;
        }

        /**
         * Get details of a single user
         *
         * @param $nick
         *
         * @return mixed
         */
        public function getUserDetails($nick)
        {
            $nick = strtolower($nick);

            return $this->users[$nick];
        }

    }