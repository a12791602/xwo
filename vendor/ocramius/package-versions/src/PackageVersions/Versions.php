<?php

declare(strict_types=1);

namespace PackageVersions;

/**
 * This class is generated by ocramius/package-versions, specifically by
 * @see \PackageVersions\Installer
 *
 * This file is overwritten at every run of `composer install` or `composer update`.
 */
final class Versions
{
    public const ROOT_PACKAGE_NAME = 'laravel/laravel';
    /**
     * Array of all available composer packages.
     * Dont read this array from your calling code, but use the \PackageVersions\Versions::getVersion() method instead.
     *
     * @var array<string, string>
     * @internal
     */
    public const VERSIONS          = array (
  'asm89/stack-cors' => '1.2.0@c163e2b614550aedcf71165db2473d936abbced6',
  'barryvdh/laravel-cors' => 'v0.11.4@03492f1a3bc74a05de23f93b94ac7cc5c173eec9',
  'caouecs/laravel-lang' => '4.0.2@884265ed667ddf826d8df495ea6b2bb3330be79c',
  'dnoegel/php-xdg-base-dir' => '0.1@265b8593498b997dc2d31e75b89f053b5cc9621a',
  'doctrine/inflector' => 'v1.3.0@5527a48b7313d15261292c149e55e26eae771b0a',
  'doctrine/lexer' => '1.1.0@e17f069ede36f7534b95adec71910ed1b49c74ea',
  'dragonmantank/cron-expression' => 'v2.3.0@72b6fbf76adb3cf5bc0db68559b33d41219aba27',
  'egulias/email-validator' => '2.1.11@92dd169c32f6f55ba570c309d83f5209cefb5e23',
  'erusev/parsedown' => '1.7.3@6d893938171a817f4e9bc9e86f2da1e370b7bcd7',
  'fideloper/proxy' => '4.2.1@03085e58ec7bee24773fa5a8850751a6e61a7e8a',
  'genealabs/laravel-model-caching' => '0.4.24@7b8bb58248789c337d19621bab99918fd61a2646',
  'genealabs/laravel-pivot-events' => '0.2.0@f867a42cb1c06d5a360bc95e342a30ec851c89d4',
  'graylog2/gelf-php' => '1.6.3@252a8be183f36dc8ad60d952f17bc36138d743cc',
  'jakub-onderka/php-console-color' => 'v0.2@d5deaecff52a0d61ccb613bb3804088da0307191',
  'jakub-onderka/php-console-highlighter' => 'v0.4@9f7a229a69d52506914b4bc61bfdb199d90c5547',
  'jaybizzle/crawler-detect' => 'v1.2.84@b7f35477a56609dd0d753c07ada912b66af3df01',
  'jenssegers/agent' => 'v2.6.3@bcb895395e460478e101f41cdab139c48dc721ce',
  'laravel/framework' => 'v5.8.35@5a9e4d241a8b815e16c9d2151e908992c38db197',
  'laravel/tinker' => 'v1.0.10@ad571aacbac1539c30d480908f9d0c9614eaf1a7',
  'laravelbook/ardent' => '3.6.0@ae8983fa82060ed9280cc6a2c9b267a966124b0f',
  'lcobucci/jwt' => '3.3.1@a11ec5f4b4d75d1fcd04e133dede4c317aac9e18',
  'league/flysystem' => '1.0.55@33c91155537c6dc899eacdc54a13ac6303f156e6',
  'mobiledetect/mobiledetectlib' => '2.8.33@cd385290f9a0d609d2eddd165a1e44ec1bf12102',
  'monolog/monolog' => '1.25.1@70e65a5470a42cfec1a7da00d30edb6e617e8dcf',
  'moontoast/math' => '1.1.2@c2792a25df5cad4ff3d760dd37078fc5b6fccc79',
  'namshi/jose' => '7.2.3@89a24d7eb3040e285dd5925fcad992378b82bcff',
  'nesbot/carbon' => '2.24.0@934459c5ac0658bc765ad1e53512c7c77adcac29',
  'nikic/php-parser' => 'v4.2.4@97e59c7a16464196a8b9c77c47df68e4a39a45c4',
  'opis/closure' => '3.4.0@60a97fff133b1669a5b1776aa8ab06db3f3962b7',
  'orangehill/iseed' => 'v2.6.2@fe8fbf51ab57bcc28282c6b1109e610c4a44fad9',
  'overtrue/laravel-lang' => '3.0.17@b36ac877da7b44135e1e3368456577c149b2e228',
  'paragonie/constant_time_encoding' => 'v2.2.3@55af0dc01992b4d0da7f6372e2eac097bbbaffdb',
  'paragonie/random_compat' => 'v9.99.99@84b4dfb120c6f9b4ff7b3685f9b8f1aa365a0c95',
  'pda/pheanstalk' => 'v4.0.0@328708b2cb843c214579a9ac3d1730c074038d6a',
  'php-curl-class/php-curl-class' => '8.6.1@a418962c4385aba6b97d2d57d65a0d405b514cf7',
  'phpoption/phpoption' => '1.5.0@94e644f7d2051a5f0fcf77d81605f152eecff0ed',
  'predis/predis' => 'v1.1.1@f0210e38881631afeafb56ab43405a92cafd9fd1',
  'psr/container' => '1.0.0@b7ce3b176482dbbc1245ebf52b181af44c2cf55f',
  'psr/log' => '1.1.0@6c001f1daafa3a3ac1d8ff69ee4db8e799a654dd',
  'psr/simple-cache' => '1.0.1@408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
  'psy/psysh' => 'v0.9.9@9aaf29575bb8293206bb0420c1e1c87ff2ffa94e',
  'ramsey/uuid' => '3.8.0@d09ea80159c1929d75b3f9c60504d613aeb4a1e3',
  'ricardofontanelli/laravel-telegram' => '1.2@4fd98d4d1ae050f63d2c9fe35531661e397c9882',
  'swiftmailer/swiftmailer' => 'v6.2.1@5397cd05b0a0f7937c47b0adcb4c60e5ab936b6a',
  'symfony/console' => 'v4.3.4@de63799239b3881b8a08f8481b22348f77ed7b36',
  'symfony/css-selector' => 'v4.3.4@c6e5e2a00db768c92c3ae131532af4e1acc7bd03',
  'symfony/debug' => 'v4.3.4@afcdea44a2e399c1e4b52246ec8d54c715393ced',
  'symfony/event-dispatcher' => 'v4.3.4@429d0a1451d4c9c4abe1959b2986b88794b9b7d2',
  'symfony/event-dispatcher-contracts' => 'v1.1.5@c61766f4440ca687de1084a5c00b08e167a2575c',
  'symfony/finder' => 'v4.3.4@86c1c929f0a4b24812e1eb109262fc3372c8e9f2',
  'symfony/http-foundation' => 'v4.3.4@d804bea118ff340a12e22a79f9c7e7eb56b35adc',
  'symfony/http-kernel' => 'v4.3.4@5e0fc71be03d52cd00c423061cfd300bd6f92a52',
  'symfony/mime' => 'v4.3.4@987a05df1c6ac259b34008b932551353f4f408df',
  'symfony/polyfill-ctype' => 'v1.12.0@550ebaac289296ce228a706d0867afc34687e3f4',
  'symfony/polyfill-iconv' => 'v1.12.0@685968b11e61a347c18bf25db32effa478be610f',
  'symfony/polyfill-intl-idn' => 'v1.12.0@6af626ae6fa37d396dc90a399c0ff08e5cfc45b2',
  'symfony/polyfill-mbstring' => 'v1.12.0@b42a2f66e8f1b15ccf25652c3424265923eb4f17',
  'symfony/polyfill-php56' => 'v1.12.0@0e3b212e96a51338639d8ce175c046d7729c3403',
  'symfony/polyfill-php72' => 'v1.12.0@04ce3335667451138df4307d6a9b61565560199e',
  'symfony/polyfill-php73' => 'v1.12.0@2ceb49eaccb9352bff54d22570276bb75ba4a188',
  'symfony/polyfill-util' => 'v1.12.0@4317de1386717b4c22caed7725350a8887ab205c',
  'symfony/process' => 'v4.3.4@e89969c00d762349f078db1128506f7f3dcc0d4a',
  'symfony/routing' => 'v4.3.4@ff1049f6232dc5b6023b1ff1c6de56f82bcd264f',
  'symfony/service-contracts' => 'v1.1.6@ea7263d6b6d5f798b56a45a5b8d686725f2719a3',
  'symfony/translation' => 'v4.3.4@28498169dd334095fa981827992f3a24d50fed0f',
  'symfony/translation-contracts' => 'v1.1.6@325b17c24f3ee23cbecfa63ba809c6d89b5fa04a',
  'symfony/var-dumper' => 'v4.3.4@641043e0f3e615990a0f29479f9c117e8a6698c6',
  'tijsverkoyen/css-to-inline-styles' => '2.2.1@0ed4a2ea4e0902dac0489e6436ebcd5bbcae9757',
  'tymon/jwt-auth' => '1.0.0-rc.4.1@63698d304554e5d0bc3eb481cc260a9fc900e151',
  'vlucas/phpdotenv' => 'v3.6.0@1bdf24f065975594f6a117f0f1f6cabf1333b156',
  'waavi/sanitizer' => '1.0.11@ab12ea90dcaae937dcce9970abb30dbfe9e35b78',
  'barryvdh/laravel-debugbar' => 'v3.2.8@18208d64897ab732f6c04a19b319fe8f1d57a9c0',
  'barryvdh/laravel-ide-helper' => 'v2.6.5@8740a9a158d3dd5cfc706a9d4cc1bf7a518f99f3',
  'barryvdh/reflection-docblock' => 'v2.0.6@6b69015d83d3daf9004a71a89f26e27d27ef6a16',
  'beyondcode/laravel-dump-server' => '1.3.0@fcc88fa66895f8c1ff83f6145a5eff5fa2a0739a',
  'composer/ca-bundle' => '1.2.4@10bb96592168a0f8e8f6dcde3532d9fa50b0b527',
  'composer/composer' => '1.9.0@314aa57fdcfc942065996f59fb73a8b3f74f3fa5',
  'composer/semver' => '1.5.0@46d9139568ccb8d9e7cdd4539cab7347568a5e2e',
  'composer/spdx-licenses' => '1.5.2@7ac1e6aec371357df067f8a688c3d6974df68fa5',
  'composer/xdebug-handler' => '1.3.3@46867cbf8ca9fb8d60c506895449eb799db1184f',
  'dealerdirect/phpcodesniffer-composer-installer' => 'v0.5.0@e749410375ff6fb7a040a68878c656c2e610b132',
  'doctrine/cache' => 'v1.8.0@d768d58baee9a4862ca783840eca1b9add7a7f57',
  'doctrine/dbal' => 'v2.9.2@22800bd651c1d8d2a9719e2a3dc46d5108ebfcc9',
  'doctrine/event-manager' => 'v1.0.0@a520bc093a0170feeb6b14e9d83f3a14452e64b3',
  'doctrine/instantiator' => '1.2.0@a2c590166b2133a4633738648b6b064edae0814a',
  'filp/whoops' => '2.5.0@cde50e6720a39fdacb240159d3eea6865d51fd96',
  'fzaninotto/faker' => 'v1.8.0@f72816b43e74063c8b10357394b6bba8cb1c10de',
  'hamcrest/hamcrest-php' => 'v2.0.0@776503d3a8e85d4f9a1148614f95b7a608b046ad',
  'jean85/pretty-package-versions' => '1.2@75c7effcf3f77501d0e0caa75111aff4daa0dd48',
  'justinrainbow/json-schema' => '5.2.8@dcb6e1006bb5fd1e392b4daa68932880f37550d4',
  'maximebf/debugbar' => 'v1.15.0@30e7d60937ee5f1320975ca9bc7bcdd44d500f07',
  'mockery/mockery' => '1.2.3@4eff936d83eb809bde2c57a3cea0ee9643769031',
  'myclabs/deep-copy' => '1.9.3@007c053ae6f31bba39dfa19a7726f56e9763bbea',
  'nette/bootstrap' => 'v3.0.0@e1075af05c211915e03e0c86542f3ba5433df4a3',
  'nette/di' => 'v3.0.1@4aff517a1c6bb5c36fa09733d4cea089f529de6d',
  'nette/finder' => 'v2.5.1@14164e1ddd69e9c5f627ff82a10874b3f5bba5fe',
  'nette/neon' => 'v3.0.0@cbff32059cbdd8720deccf9e9eace6ee516f02eb',
  'nette/php-generator' => 'v3.2.3@aea6e81437bb238e5f0e5b5ce06337433908e63b',
  'nette/robot-loader' => 'v3.2.0@0712a0e39ae7956d6a94c0ab6ad41aa842544b5c',
  'nette/schema' => 'v1.0.0@6241d8d4da39e825dd6cb5bfbe4242912f4d7e4d',
  'nette/utils' => 'v3.0.1@bd961f49b211997202bda1d0fbc410905be370d4',
  'nunomaduro/collision' => 'v2.1.1@b5feb0c0d92978ec7169232ce5d70d6da6b29f63',
  'nunomaduro/larastan' => 'v0.3.21@4dca6af24373eb83aa7fcc1018495ef2680838c2',
  'object-calisthenics/phpcs-calisthenics-rules' => 'v3.5.1@e4599d8c2a4a916007f57043de13bca910f8954d',
  'ocramius/package-versions' => '1.5.1@1d32342b8c1eb27353c8887c366147b4c2da673c',
  'orchestra/testbench' => 'v3.8.5@c53429b04669b76bf764f4f8f9ba53bbe2d2a292',
  'orchestra/testbench-core' => 'v3.8.7@2122fc0c3c4e592ab142786b27d5bd6c60ca7a3c',
  'phar-io/manifest' => '1.0.3@7761fcacf03b4d4f16e7ccb606d4879ca431fcf4',
  'phar-io/version' => '2.0.1@45a2ec53a73c70ce41d55cedef9063630abaf1b6',
  'phpdocumentor/reflection-common' => '2.0.0@63a995caa1ca9e5590304cd845c15ad6d482a62a',
  'phpdocumentor/reflection-docblock' => '4.3.2@b83ff7cfcfee7827e1e78b637a5904fe6a96698e',
  'phpdocumentor/type-resolver' => '1.0.1@2e32a6d48972b2c1976ed5d8967145b6cec4a4a9',
  'phpspec/prophecy' => '1.8.1@1927e75f4ed19131ec9bcc3b002e07fb1173ee76',
  'phpstan/phpdoc-parser' => '0.3.5@8c4ef2aefd9788238897b678a985e1d5c8df6db4',
  'phpstan/phpstan' => '0.11.15@1be5b3a706db16ac472a4c40ec03cf4c810b118d',
  'phpunit/php-code-coverage' => '6.1.4@807e6013b00af69b6c5d9ceb4282d0393dbb9d8d',
  'phpunit/php-file-iterator' => '2.0.2@050bedf145a257b1ff02746c31894800e5122946',
  'phpunit/php-text-template' => '1.2.1@31f8b717e51d9a2afca6c9f046f5d69fc27c8686',
  'phpunit/php-timer' => '2.1.2@1038454804406b0b5f5f520358e78c1c2f71501e',
  'phpunit/php-token-stream' => '3.1.0@e899757bb3df5ff6e95089132f32cd59aac2220a',
  'phpunit/phpunit' => '7.5.16@316afa6888d2562e04aeb67ea7f2017a0eb41661',
  'sebastian/code-unit-reverse-lookup' => '1.0.1@4419fcdb5eabb9caa61a27c7a1db532a6b55dd18',
  'sebastian/comparator' => '3.0.2@5de4fc177adf9bce8df98d8d141a7559d7ccf6da',
  'sebastian/diff' => '3.0.2@720fcc7e9b5cf384ea68d9d930d480907a0c1a29',
  'sebastian/environment' => '4.2.2@f2a2c8e1c97c11ace607a7a667d73d47c19fe404',
  'sebastian/exporter' => '3.1.2@68609e1261d215ea5b21b7987539cbfbe156ec3e',
  'sebastian/global-state' => '2.0.0@e8ba02eed7bbbb9e59e43dedd3dddeff4a56b0c4',
  'sebastian/object-enumerator' => '3.0.3@7cfd9e65d11ffb5af41198476395774d4c8a84c5',
  'sebastian/object-reflector' => '1.1.1@773f97c67f28de00d397be301821b06708fca0be',
  'sebastian/recursion-context' => '3.0.0@5b0cd723502bac3b006cbf3dbf7a1e3fcefe4fa8',
  'sebastian/resource-operations' => '2.0.1@4d7a795d35b889bf80a0cc04e08d77cedfa917a9',
  'sebastian/version' => '2.0.1@99732be0ddb3361e16ad77b68ba41efc8e979019',
  'seld/jsonlint' => '1.7.1@d15f59a67ff805a44c50ea0516d2341740f81a38',
  'seld/phar-utils' => '1.0.1@7009b5139491975ef6486545a39f3e6dad5ac30a',
  'sirbrillig/phpcs-import-detection' => 'v1.1.4@81e593b8f9cda94548a89b7dfdbfc75ee35ebb39',
  'slevomat/coding-standard' => '5.0.4@287ac3347c47918c0bf5e10335e36197ea10894c',
  'squizlabs/php_codesniffer' => '3.4.2@b8a7362af1cc1aadb5bd36c3defc4dda2cf5f0a8',
  'symfony/filesystem' => 'v4.3.4@9abbb7ef96a51f4d7e69627bc6f63307994e4263',
  'theseer/tokenizer' => '1.1.3@11336f6f84e16a720dae9d8e6ed5019efa85a0f9',
  'webmozart/assert' => '1.5.0@88e6d84706d09a236046d686bbea96f07b3a34f4',
  'xethron/laravel-4-generators' => '3.1.1@526f0a07d8ae44e365a20b1bf64c9956acd2a859',
  'xethron/migrations-generator' => 'v2.0.2@a05bd7319ed808fcc3125212e37d30ccbe0d2b8b',
  'laravel/laravel' => 'dev-master@0ffc1d310a09c05828430204cc7aa51e47059b6e',
);

    private function __construct()
    {
    }

    /**
     * @throws \OutOfBoundsException If a version cannot be located.
     *
     * @psalm-param key-of<self::VERSIONS> $packageName
     */
    public static function getVersion(string $packageName) : string
    {
        if (isset(self::VERSIONS[$packageName])) {
            return self::VERSIONS[$packageName];
        }

        throw new \OutOfBoundsException(
            'Required package "' . $packageName . '" is not installed: check your ./vendor/composer/installed.json and/or ./composer.lock files'
        );
    }
}