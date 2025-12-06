<?

class ConfiguracaoSip extends InfraConfiguracao
{

  private static $instance = null;

  public static function getInstance(): ConfiguracaoSip
  {
    if (ConfiguracaoSip::$instance == null) {
      ConfiguracaoSip::$instance = new ConfiguracaoSip();
    }
    return ConfiguracaoSip::$instance;
  }

  public function getArrConfiguracoes(): array
  {
    return array(
      'Sip' => array(
        'URL' => $_ENV['SIP_URL'],
        'Producao' => filter_var($_ENV['SIP_PRODUCAO'], FILTER_VALIDATE_BOOLEAN)
      ),

      'PaginaSip' => array('NomeSistema' => $_ENV['SIP_NOME_SISTEMA']),

      'SessaoSip' => array(
        'SiglaOrgaoSistema' => $_ENV['SIP_SIGLA_ORGAO_SISTEMA'],
        'SiglaSistema' => $_ENV['SIP_SIGLA_SISTEMA'],
        'PaginaLogin' => $_ENV['SIP_PAGINA_LOGIN'],
        'SipWsdl' => $_ENV['SIP_WSDL'],
        'ChaveAcesso' => $_ENV['SIP_CHAVE_ACESSO'], // 'd27791b894028d9e7fa34887ad6f0c9a2c559cccda5f64f4e108e3573d5db862b66fb933'
        'https' => filter_var($_ENV['SIP_HTTPS'], FILTER_VALIDATE_BOOLEAN)
      ),

      'BancoSip' => array(
        'Servidor' => $_ENV['SIP_BD_SERVIDOR'],
        'Porta' => $_ENV['SIP_BD_PORTA'],
        'Banco' => $_ENV['SIP_BD_BANCO'],
        'Usuario' => $_ENV['SIP_BD_USUARIO'],
        'Senha' => $_ENV['SIP_BD_SENHA'],
        'Tipo' => $_ENV['SIP_BD_TIPO']
      ),

      /*
      'BancoAuditoriaSip'  => array(
          'Servidor' => '[Servidor BD]',
          'Porta' => '',
          'Banco' => '',
          'Usuario' => '',
          'Senha' => '',
          'Tipo' => ''), //MySql, SqlServer, Oracle ou PostgreSql
      */

      'CacheSip' => array(
        'Servidor' => $_ENV['SIP_CACHE_SERVIDOR'],
        'Porta' => $_ENV['SIP_CACHE_PORTA']
      ),

      'hCaptcha' => array(
        'ChaveSecreta' => $_ENV['SIP_HCAPTCHA_CHAVE_SECRETA'],
        'ChaveSite' => $_ENV['SIP_HCAPTCHA_CHAVE_SITE']
      ),

      'ReCaptchaV2' => array(
        'ChaveSecreta' => $_ENV['SIP_RECAPTCHA_V2_CHAVE_SECRETA'],
        'ChaveSite' => $_ENV['SIP_RECAPTCHA_V2_CHAVE_SITE']
      ),

      'ReCaptchaV3' => array(
        'ChaveSecreta' => $_ENV['SIP_RECAPTCHA_V3_CHAVE_SECRETA'],
        'ChaveSite' => $_ENV['SIP_RECAPTCHA_V3_CHAVE_SITE'],
        'Score' => $_ENV['SIP_RECAPTCHA_V3_SCORE']
      ),

      'Cloudflare' => array(
        'ChaveSecreta' => '',
        'ChaveSite' => ''
      ),

      'InfraMail' => array(
        'Tipo' => $_ENV['SIP_INFRA_MAIL_TIPO'],
        'Servidor' => $_ENV['SIP_INFRA_MAIL_SERVIDOR'],
        'Porta' => $_ENV['SIP_INFRA_MAIL_PORTA'],
        'Codificacao' => $_ENV['SIP_INFRA_MAIL_CODIFICACAO'],
        'MaxDestinatarios' => $_ENV['SIP_INFRA_MAIL_MAX_DESTINATARIOS'],
        'MaxTamAnexosMb' => $_ENV['SIP_INFRA_MAIL_MAX_TAM_ANEXOS_MB'],
        'Seguranca' => $_ENV['SIP_INFRA_MAIL_SEGURANCA'],
        'Autenticar' => filter_var($_ENV['SIP_INFRA_MAIL_AUTENTICAR'], FILTER_VALIDATE_BOOLEAN),
        'Usuario' => $_ENV['SIP_INFRA_MAIL_USUARIO'],
        'Senha' => $_ENV['SIP_INFRA_MAIL_SENHA'],
        'Protegido' => $_ENV['SIP_INFRA_MAIL_PROTEGIDO']
      )
    );
  }
}

?>
