# Copyright 2018 Google LLC
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.

"""This script is used to synthesize generated parts of this library."""

import os
import synthtool as s
import synthtool.gcp as gcp
import logging

logging.basicConfig(level=logging.DEBUG)

gapic = gcp.GAPICGenerator()
common = gcp.CommonTemplates()

v1beta1_library = gapic.php_library(
    service='redis',
    version='v1beta1',
    artman_output_name='google-cloud-redis-v1beta1')

# copy all src except partial veneer classes
s.move(v1beta1_library / f'src/V1beta1/Gapic')
s.move(v1beta1_library / f'src/V1beta1/resources')

# copy proto files to src also
s.move(v1beta1_library / f'proto/src/Google/Cloud/Redis', f'src/')
s.move(v1beta1_library / f'tests/')

# copy GPBMetadata file to metadata
s.move(v1beta1_library / f'proto/src/GPBMetadata/Google/Cloud/Redis', f'metadata/')

v1_library = gapic.php_library(
    service='redis',
    version='v1',
    artman_output_name='google-cloud-redis-v1')

# copy all src except partial veneer classes
s.move(v1_library / f'src/V1/Gapic')
s.move(v1_library / f'src/V1/resources')

# copy proto files to src also
s.move(v1_library / f'proto/src/Google/Cloud/Redis', f'src/')
s.move(v1_library / f'tests/')

# copy GPBMetadata file to metadata
s.move(v1_library / f'proto/src/GPBMetadata/Google/Cloud/Redis', f'metadata/')

# document and utilize apiEndpoint instead of serviceAddress
s.replace(
    "**/Gapic/*GapicClient.php",
    r"'serviceAddress' =>",
    r"'apiEndpoint' =>")
s.replace(
    "**/Gapic/*GapicClient.php",
    r"@type string \$serviceAddress\n\s+\*\s+The address",
    r"""@type string $serviceAddress
     *           **Deprecated**. This option will be removed in a future major release. Please
     *           utilize the `$apiEndpoint` option instead.
     *     @type string $apiEndpoint
     *           The address""")
s.replace(
    "**/Gapic/*GapicClient.php",
    r"\$transportConfig, and any \$serviceAddress",
    r"$transportConfig, and any `$apiEndpoint`")

# prevent proto messages from being marked final
s.replace(
    "src/V*/**/*.php",
    r"final class",
    r"class")

# Replace "Unwrapped" with "Value" for method names.
s.replace(
    "src/V*/**/*.php",
    r"public function ([s|g]\w{3,})Unwrapped",
    r"public function \1Value"
)

# fix year
s.replace(
    '**/Gapic/*GapicClient.php',
    r'Copyright \d{4}',
    r'Copyright 2018')
s.replace(
    'tests/**/V1*/*Test.php',
    r'Copyright \d{4}',
    r'Copyright 2018')

# Change the wording for the deprecation warning.
s.replace(
    'src/*/*_*.php',
    r'will be removed in the next major release',
    'will be removed in a future release')

# Fix class references in gapic samples
for version in ['V1', 'V1beta1']:
    pathExpr = 'src/' + version + '/Gapic/CloudRedisGapicClient.php'

    types = {
        'new CloudRedisClient': r'new Google\\Cloud\\Redis\\'+ version + r'\\CloudRedisClient',
        'new Instance': r'new Google\\Cloud\\Redis\\' + version + r'\\Instance',
        '= Tier::': r'= Google\\Cloud\\Redis\\' + version + r'\\Instance\\Tier::',
        'new FieldMask': r'new Google\\Protobuf\\FieldMask',
        'new InputConfig': r'new Google\\Cloud\\Redis\\' + version + r'\\InputConfig',
        'new OutputConfig': r'new Google\\Cloud\\Redis\\' + version + r'\\OutputConfig',
        '= DataProtectionMode': r'= Google\\Cloud\\Redis\\' + version + r'\\FailoverInstanceRequest\\DataProtectionMode::'
    }

    for search, replace in types.items():
        s.replace(
            pathExpr,
            search,
            replace
        )
