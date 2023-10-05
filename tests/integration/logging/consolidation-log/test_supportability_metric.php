<?php
/*
 * Copyright 2022 New Relic Corporation. All rights reserved.
 * SPDX-License-Identifier: Apache-2.0
 */

/*DESCRIPTION
Test that Supportability metrics: library/Consolidation/Log/detected and 
Logging/PHP/Consolidation/Log/disabled metrics are created when consolidation-log 
library is detected.
This test is a mock composer project that uses a logging library as if it
were installed by composer. The library itself is a mock.
*/

/*INI
newrelic.application_logging.enabled = true
*/

/*EXPECT_METRICS
[
  "?? agent run id",
  "?? timeframe start",
  "?? timeframe stop",
  [
    [{"name":"DurationByCaller/Unknown/Unknown/Unknown/Unknown/all"},             [1, "??", "??", "??", "??", "??"]],
    [{"name":"DurationByCaller/Unknown/Unknown/Unknown/Unknown/allOther"},        [1, "??", "??", "??", "??", "??"]],
    [{"name":"OtherTransaction/all"},                                             [1, "??", "??", "??", "??", "??"]],
    [{"name":"OtherTransaction/php__FILE__"},                                     [1, "??", "??", "??", "??", "??"]],
    [{"name":"OtherTransactionTotalTime"},                                        [1, "??", "??", "??", "??", "??"]],
    [{"name":"OtherTransactionTotalTime/php__FILE__"},                            [1, "??", "??", "??", "??", "??"]],
    [{"name":"Supportability/Logging/PHP/Consolidation/Log/disabled"},            [1, "??", "??", "??", "??", "??"]],
    [{"name":"Supportability/library/Consolidation/Log/detected"},                [1, "??", "??", "??", "??", "??"]],
    [{"name":"Supportability/Logging/Forwarding/PHP/enabled"},                    [1, "??", "??", "??", "??", "??"]],
    [{"name":"Supportability/Logging/Metrics/PHP/enabled"},                       [1, "??", "??", "??", "??", "??"]],
    [{"name":"Supportability/Logging/LocalDecorating/PHP/disabled"},              [1, "??", "??", "??", "??", "??"]]
  ]
]
*/


require_once(realpath(dirname(__FILE__)) . '/vendor/consolidation/log/src/Logger.php');
