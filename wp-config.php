<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'eletromidia_wp');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'root');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'M*:8BV#^0A)8*m-8zY$jk4iposB!63L]5ZpV/G.ir_kSmZO~x}sXYjK(=2eb5.t ');
define('SECURE_AUTH_KEY',  '1mW)^r*kFH>4^+Xt1JT8vEjiQ)%aV%xNvPW?WPP.=|,,8K-]Q`K,gMQiS_t@h()]');
define('LOGGED_IN_KEY',    '|<q|9r*z32-xRVr#AVP|YXDtlwvM$5yB1f+[{V-8R+5a*9+}3az8+PL8&f;6kyQo');
define('NONCE_KEY',        'dTu>RVNkz7#cy)HL!,Uffjm`Paj+WK41zdFe*I#eF^$DdJXr?h A+p:-B+VS^t7O');
define('AUTH_SALT',        'T_0H0D@FBKj7=(Q/OU,}XYN-bl0lQvm-/MM=#Y}w;38*T^h;45|l(#5,bj/tNcv5');
define('SECURE_AUTH_SALT', '~gOxC;`)e?.U&CBaTYrHpILiPU:-+SUF-O=t#O|y8c{B14NRi8+^di=UYh%:^9S9');
define('LOGGED_IN_SALT',   'e^q@+)sIcYD2Gr73)):Zys<E~&dcJE7ll|.0>wt4Uw1[RX3&|Z1WIw~|Y]owMtp~');
define('NONCE_SALT',       '&~a)@Bcu:}f.a8gv+g!T2W5Q;vmEe}waTvtDuEON+$ny_#mi[_t=_j4vUhK[Dd28');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'el_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
