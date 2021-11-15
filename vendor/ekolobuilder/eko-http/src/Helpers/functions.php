<?php
    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */

    use Ekolo\Component\EkoSession\Session;

    if (!function_exists('session')) {
        /**
         * Permet de manipuler l'objet Ekolo\Component\EkoSession\Session
         * @param string $key La clé de la session
         * @param mixed $value La valeur à assigner à la session
         */
        function session(string $key = null, $value = null) {
            $session = new Session;

            if (!empty($key)) {
                if (!empty($value)) {

                    $session->add([
                        $key => $value
                    ]);
                }

                return $session->get($key);
            }else {
                return $session;
            }
        }
    }

    if (!function_exists('is_email_valid')) {
        /**
         * Vérifie si l'email passé en paramètre est valide
         * @param string $email L'adresse email en question
         * @return bool
         */
        function is_email_valid(string $email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }
    }

    if (!function_exists('make_to_pluriel')) {
        /**
         * Permet de renvoyé un 's' si la valeur passé est > 1
         * @param mixed $value
         * @return string
         */
        function make_to_pluriel($value) {
            return $value > 1 ? 's' : '';
        }
    }

    if (!function_exists('is_int_valid')) {
        /**
         * Vérifie si la valeur passée en paramètre est réellement un entier
         * @param mixed $value La valeur à vérifier
         * @return boolean
         */
        function is_int_valid($value) {
            $value = (int) $value;

            if ($value > 0) {
                return true;
            }

            return false;
        }
    }