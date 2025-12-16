<?php
/*
 * MikoPBX - free phone system for small business
 * Copyright © 2017-2025 Alexey Portnov and Nikolay Beketov
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program.
 * If not, see <https://www.gnu.org/licenses/>.
 */

namespace Modules\ModuleDutchLanguagePack;

use MikoPBX\Common\Models\PbxSettings;
use MikoPBX\Core\System\Configs\SoundFilesConf;
use MikoPBX\Core\System\SystemMessages;
use MikoPBX\Modules\Config\ConfigClass;

/**
 * ModuleDutchLanguagePackConf
 *
 * Dutch Language Pack Module for MikoPBX
 *
 * This is a Language Pack module that provides:
 * - Complete Dutch UI translations (16 files in Messages/nl/)
 * - Dutch voice prompts (638 sound files in Sounds/nl-nl/)
 *
 * Language Pack modules manage sound files on enable/disable:
 * - Enable: Install sound files to system
 * - Disable: Remove sound files and fallback to English if needed
 *
 * @package Modules\ModuleDutchLanguagePack
 */
class ModuleDutchLanguagePackConf extends ConfigClass
{
    /**
     * Module unique identifier
     */
    public const string MODULE_ID = 'ModuleDutchLanguagePack';

    /**
     * Language code for this pack
     */
    public const string LANGUAGE_CODE = 'nl-nl';

    /**
     * Called when module is enabled
     * Installs Dutch sound files to the system
     *
     * @return void
     */
    public function onAfterModuleEnable(): void
    {
        SystemMessages::sysLogMsg(
            __METHOD__,
            'Dutch Language Pack enabled, installing sound files',
            LOG_INFO
        );

        // Install sound files (638 files)
        $result = SoundFilesConf::installModuleSounds(self::MODULE_ID);

        if ($result) {
            SystemMessages::sysLogMsg(
                __METHOD__,
                'Dutch sound files installed successfully',
                LOG_INFO
            );
        } else {
            SystemMessages::sysLogMsg(
                __METHOD__,
                'Failed to install Dutch sound files',
                LOG_WARNING
            );
        }
    }

    /**
     * Called when module is disabled
     * Removes Dutch sound files and switches to English if Dutch was active
     *
     * @return void
     */
    public function onAfterModuleDisable(): void
    {
        SystemMessages::sysLogMsg(
            __METHOD__,
            'Dutch Language Pack disabled, removing sound files',
            LOG_INFO
        );

        // Check if Dutch language is currently active
        $currentLanguage = PbxSettings::getValueByKey(PbxSettings::PBX_LANGUAGE);

        if ($currentLanguage === self::LANGUAGE_CODE) {
            // Switch to English as fallback
            $languageSetting = PbxSettings::findFirstByKey(PbxSettings::PBX_LANGUAGE);
            if ($languageSetting !== null) {
                $languageSetting->value = 'en-en';
                $languageSetting->save();

                SystemMessages::sysLogMsg(
                    __METHOD__,
                    'System language switched from nl-nl to en-en (fallback)',
                    LOG_NOTICE
                );
            }
        }

        // Remove sound files (entire nl-nl directory)
        $result = SoundFilesConf::removeModuleSounds(self::MODULE_ID);

        if ($result) {
            SystemMessages::sysLogMsg(
                __METHOD__,
                'Dutch sound files removed successfully',
                LOG_INFO
            );
        } else {
            SystemMessages::sysLogMsg(
                __METHOD__,
                'Failed to remove Dutch sound files',
                LOG_WARNING
            );
        }
    }
}
