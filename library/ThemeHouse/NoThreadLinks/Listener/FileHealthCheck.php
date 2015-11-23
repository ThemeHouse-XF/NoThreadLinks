<?php

class ThemeHouse_NoThreadLinks_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/ThemeHouse/NoThreadLinks/Extend/XenForo/BbCode/Formatter/Base.php' => '54c7b588590ec96ebcaacae43cb1d9e4',
                'library/ThemeHouse/NoThreadLinks/Extend/XenForo/Model/Post.php' => '3029fb65c372e7a8aa2336b29f4468ab',
                'library/ThemeHouse/NoThreadLinks/Install/Controller.php' => 'a0ff0f100653d2057bd179b87414e5bb',
                'library/ThemeHouse/NoThreadLinks/Listener/LoadClass.php' => '84778f6c93e43502946ca619c85c92b8',
                'library/ThemeHouse/NoThreadLinks/Listener/TemplateCreate.php' => '661b93ff53bfcf2af0926cbde5e63d50',
                'library/ThemeHouse/NoThreadLinks/Listener/TemplateHook.php' => 'ecc3613bbab2360cd4ceb002835ca02d',
                'library/ThemeHouse/NoThreadLinks/Option/NodeChooser.php' => 'f260598bc559ff45ff4eec4090b596e8',
                'library/ThemeHouse/Install.php' => '18f1441e00e3742460174ab197bec0b7',
                'library/ThemeHouse/Install/20151109.php' => '2e3f16d685652ea2fa82ba11b69204f4',
                'library/ThemeHouse/Deferred.php' => 'ebab3e432fe2f42520de0e36f7f45d88',
                'library/ThemeHouse/Deferred/20150106.php' => 'a311d9aa6f9a0412eeba878417ba7ede',
                'library/ThemeHouse/Listener/ControllerPreDispatch.php' => 'fdebb2d5347398d3974a6f27eb11a3cd',
                'library/ThemeHouse/Listener/ControllerPreDispatch/20150911.php' => 'f2aadc0bd188ad127e363f417b4d23a9',
                'library/ThemeHouse/Listener/InitDependencies.php' => '8f59aaa8ffe56231c4aa47cf2c65f2b0',
                'library/ThemeHouse/Listener/InitDependencies/20150212.php' => 'f04c9dc8fa289895c06c1bcba5d27293',
                'library/ThemeHouse/Listener/LoadClass.php' => '5cad77e1862641ddc2dd693b1aa68a50',
                'library/ThemeHouse/Listener/LoadClass/20150518.php' => 'f4d0d30ba5e5dc51cda07141c39939e3',
                'library/ThemeHouse/Listener/Template.php' => '0aa5e8aabb255d39cf01d671f9df0091',
                'library/ThemeHouse/Listener/Template/20150106.php' => '8d42b3b2d856af9e33b69a2ce1034442',
                'library/ThemeHouse/Listener/TemplateCreate.php' => '6bdeb679af2ea41579efde3e41e65cc7',
                'library/ThemeHouse/Listener/TemplateCreate/20150106.php' => 'c253a7a2d3a893525acf6070e9afe0dd',
                'library/ThemeHouse/Listener/TemplateHook.php' => 'a767a03baad0ca958d19577200262d50',
                'library/ThemeHouse/Listener/TemplateHook/20150106.php' => '71c539920a651eef3106e19504048756',
            ));
    }
}