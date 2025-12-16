<div class="ui segment">
    <h2 class="ui header">
        <i class="netherlands flag"></i>
        <div class="content">
            {{ t._('BreadcrumbModuleDutchLanguagePack') }}
            <div class="sub header">{{ t._('SubHeaderModuleDutchLanguagePack') }}</div>
        </div>
    </h2>

    <div class="ui three statistics">
        <div class="statistic">
            <div class="value">
                <i class="microphone icon"></i> {{ soundFileCount }}
            </div>
            <div class="label">{{ t._('mdlp_SoundFiles') }}</div>
        </div>
        <div class="statistic">
            <div class="value">
                <i class="file alternate icon"></i> {{ translationFileCount }}
            </div>
            <div class="label">{{ t._('mdlp_TranslationFiles') }}</div>
        </div>
        <div class="statistic">
            <div class="value">
                <i class="language icon"></i> {{ translationStringCount }}
            </div>
            <div class="label">{{ t._('mdlp_TranslationStrings') }}</div>
        </div>
    </div>

    <div class="ui info message">
        <div class="header">
            <i class="info circle icon"></i>
            {{ t._('mdlp_HowToUse') }}
        </div>
        <p>{{ t._('mdlp_Step1') }}</p>
    </div>

    <a href="{{ url('general-settings/modify') }}" class="ui primary button">
        <i class="cog icon"></i>
        {{ t._('mdlp_GoToGeneralSettings') }}
    </a>

    <div class="ui divider"></div>

    <div class="ui two column stackable grid">
        <div class="column">
            <h3 class="ui header">
                <i class="certificate icon"></i>
                <div class="content">
                    {{ t._('mdlp_LicenseHeader') }}
                </div>
            </h3>
            <div class="ui list">
                <div class="item">
                    <i class="file code icon"></i>
                    <div class="content">
                        <div class="header">{{ t._('mdlp_ModuleCode') }}</div>
                        <div class="description">GNU General Public License v3.0</div>
                    </div>
                </div>
                <div class="item">
                    <i class="microphone icon"></i>
                    <div class="content">
                        <div class="header">{{ t._('mdlp_SoundFilesLicense') }}</div>
                        <div class="description">{{ t._('mdlp_SoundFilesLicenseText') }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <h3 class="ui header">
                <i class="copyright icon"></i>
                <div class="content">
                    {{ t._('mdlp_CopyrightHeader') }}
                </div>
            </h3>
            <div class="ui list">
                <div class="item">
                    <i class="code icon"></i>
                    <div class="content">
                        <div class="header">{{ t._('mdlp_ModuleDevelopment') }}</div>
                        <div class="description">© 2017-2025 Alexey Portnov and Nikolay Beketov</div>
                    </div>
                </div>
                <div class="item">
                    <i class="sound icon"></i>
                    <div class="content">
                        <div class="header">{{ t._('mdlp_VoicePrompts') }}</div>
                        <div class="description">{{ t._('mdlp_VoicePromptsSource') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
