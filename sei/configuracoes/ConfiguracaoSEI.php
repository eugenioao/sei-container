<?

class ConfiguracaoSEI extends InfraConfiguracao
{

  private static $instance = null;

  public static function getInstance()
  {
    if (ConfiguracaoSEI::$instance==null) {
      ConfiguracaoSEI::$instance = new ConfiguracaoSEI();
    }
    return ConfiguracaoSEI::$instance;
  }

  public function getArrConfiguracoes()
  {
    return array(

        'SEI' => array(
            'URL' => $_ENV['SEI_URL'],
            'Producao' => filter_var($_ENV['SEI_PRODUCAO'], FILTER_VALIDATE_BOOLEAN),
            'RepositorioArquivos' => $_ENV['SEI_REPOSITORIO_ARQUIVOS'],
            'WebServices' => filter_var($_ENV['SEI_WEBSERVICES'], FILTER_VALIDATE_BOOLEAN),
            'Modulos' => json_decode($_ENV['SEI_MODULOS_JSON']),
            'DigitosDocumento' => $_ENV['SEI_DIGITOS_DOCUMENTO']
            ),
        ),

        'PaginaSEI' => array(
            'NomeSistema' => $_ENV['SEI_SIGLA_SISTEMA'],
            'NomeSistemaComplemento' => $_ENV['SEI_NOME_SISTEMA_COMPLEMENTO'],
            'LogoMenu' => $_ENV['SEI_LOGO_MENU'],
            'Login' => filter_var($_ENV['SEI_LOGIN'], FILTER_VALIDATE_BOOLEAN),
            'Ouvidoria' => filter_var($_ENV['SEI_OUVIDORIA'], FILTER_VALIDATE_BOOLEAN),
            'PublicacaoInterna' => filter_var($_ENV['SEI_PUBLICACAO_INTERNA'], FILTER_VALIDATE_BOOLEAN),
            'UsuariosExternos' => filter_var($_ENV['SEI_USUARIOS_EXTERNOS'], FILTER_VALIDATE_BOOLEAN),
            'ValidacaoDocumentos' => filter_var($_ENV['SEI_VALIDACAO_DOCUMENTOS'], FILTER_VALIDATE_BOOLEAN),
            'ConsultaProcessual' => filter_var($_ENV['SEI_CONSULTA_PROCESSUAL'], FILTER_VALIDATE_BOOLEAN)
        ),

        'SessaoSEI' => array(
            'SiglaOrgaoSistema' => $_ENV['SEI_SIGLA_ORGAO_SISTEMA'],
            'SiglaSistema' => $_ENV['SEI_SIGLA_SISTEMA'],
            'PaginaLogin' => $_ENV['SEI_PAGINA_LOGIN'],
            'SipWsdl' => $_ENV['SEI_SIP_WSDL'],
            'ChaveAcesso' => $_ENV['SEI_CHAVE_ACESSO'], // '7babf862e12bd48f3101075c399040303d94a493c7ce9306470f719bb453e0428c6135dc'
            'https' => filter_var($_ENV['SEI_HTTPS'], FILTER_VALIDATE_BOOLEAN)
         ),

        'BancoSEI' => array(
            'Servidor' => $_ENV['SEI_BD_SERVIDOR'],
            'Porta' => $_ENV['SEI_BD_PORTA'],
            'Banco' => $_ENV['SEI_BD_BANCO'],
            'Usuario' => $_ENV['SEI_BD_USUARIO'],
            'Senha' => $_ENV['SEI_BD_SENHA'],
            'Tipo' => $_ENV['SEI_BD_TIPO']), //MySql, SqlServer, Oracle ou PostgreSql

      /*
     'BancoAuditoriaSEI'  => array(
          'Servidor' => '[servidor BD]',
          'Porta' => '',
          'Banco' => '',
          'Usuario' => '',
          'Senha' => '',
          'Tipo' => ''), //MySql, SqlServer, Oracle ou PostgreSql
     */

      /*
     'BancoReplicaSEI'  => array(
          'Servidor' => '[servidor BD]',
          'Porta' => '',
          'Banco' => '',
          'Usuario' => '',
          'Senha' => '',
          'Tipo' => ''), //MySql, SqlServer, Oracle ou PostgreSql
     */

        'CacheSEI' => array('Servidor' => $_ENV['SEI_CACHE_SERVIDOR'],
            'Porta' => $_ENV['SEI_CACHE_PORTA']),

        'Federacao' => array(
            'Habilitado' => filter_var($_ENV['SEI_FEDERACAO_HABILITADO'], FILTER_VALIDATE_BOOLEAN)
        ),

        'Manutencao' => array(
            'Ativada' => filter_var($_ENV['SEI_MANUTENCAO_ATIVADA'], FILTER_VALIDATE_BOOLEAN),
            'Usuarios' => array($_ENV['SEI_MANUTENCAO_USUARIOS']),
            'Mensagem' => $_ENV['SEI_MANUTENCAO_USUARIOS'],
            'Detalhes' => $_ENV['SEI_MANUTENCAO_DETALHES']
        ),

        'hCaptcha' => array(
            'ChaveSecreta' => $_ENV['SEI_HCAPTCHA_CHAVE_SECRETA'],
            'ChaveSite' => $_ENV['SEI_HCAPTCHA_CHAVE_SITE']
        ),

        'ReCaptchaV2' => array(
            'ChaveSecreta' => $_ENV['SEI_RECAPTCHA_V2_CHAVE_SECRETA'],
            'ChaveSite' => $_ENV['SEI_RECAPTCHA_V2_CHAVE_SITE']
        ),

        'ReCaptchaV3' => array(
            'ChaveSecreta' => $_ENV['SEI_RECAPTCHA_V3_CHAVE_SECRETA'],
            'ChaveSite' => $_ENV['SEI_RECAPTCHA_V3_CHAVE_SITE'],
            'Score' => $_ENV['SEI_RECAPTCHA_V3_SCORE']
        ),

        'Cloudflare' => array(
            'ChaveSecreta' => '',
            'ChaveSite' => ''
        ),

        'JODConverter' => array('Servidor' => $_ENV['SEI_JOD_CONVERTER_SERVIDOR']),

        'Solr' => array(
            'Servidor' => $_ENV['SEI_SOLR_SERVIDOR'],
            'Usuario' => $_ENV['SEI_SOLR_USUARIO'],
            'Senha' => $_ENV['SEI_SOLR_SENHA'],
            'CoreProtocolos' => 'sei-protocolos',
            'CoreBasesConhecimento' => 'sei-bases-conhecimento',
            'CorePublicacoes' => 'sei-publicacoes'),

        'InfraMail' => array(
            'Tipo' => $_ENV['SEI_INFRA_MAIL_TIPO'],
            'Servidor' => $_ENV['SEI_INFRA_MAIL_SERVIDOR'],
            'Porta' => $_ENV['SEI_INFRA_MAIL_PORTA'],
            'Codificacao' => $_ENV['SEI_INFRA_MAIL_CODIFICACAO'],
            'MaxDestinatarios' => $_ENV['SEI_INFRA_MAIL_MAX_DESTINATARIOS'],
            'MaxTamAnexosMb' => $_ENV['SEI_INFRA_MAIL_MAX_TAM_ANEXOS_MB'],
            'Seguranca' => $_ENV['SEI_INFRA_MAIL_SEGURANCA'],
            'Autenticar' => filter_var($_ENV['SEI_INFRA_MAIL_AUTENTICAR'], FILTER_VALIDATE_BOOLEAN),
            'Usuario' => $_ENV['SEI_INFRA_MAIL_USUARIO'],
            'Senha' => $_ENV['SEI_INFRA_MAIL_SENHA'],
            'Protegido' => $_ENV['SEI_INFRA_MAIL_PROTEGIDO']
        )
    );
  }
}
?>
