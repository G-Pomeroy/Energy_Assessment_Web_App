<?php

class ProgramDeterminer {
    public function determineApplicablePrograms($formData) {
                $applicablePrograms = [];
                if (isset($formData["primary_owner"]) && $formData["primary_owner"] == "yes") {
                    $members = $formData["members"];

                    if (isset($formData["income"])) {
                        $income = $formData["income"];
                        if (($members == "1 Person") && ($income == "Up to $27,800")) {
                            $applicablePrograms[] = 1;
                        } else if (($members == "2-4 People") && ($income == "Up to $27,800" || ($income == "Up to $52,600"))){
                            $applicablePrograms[] = 1;
                        } else if (($members == "5+ People") && ($income == "Up to $27,800" || ($income == "Up to $52,600") || ($income == "Up to $72,900"))){
                            $applicablePrograms[] = 1;
                        } else if ($income == "$72,900 or More") {
                            $applicablePrograms[] = 2;
                            $applicablePrograms[] = 3;
                        } else {
                            $applicablePrograms[] = 2;
                            $applicablePrograms[] = 3;
                        }
                    }
                }
                if (isset($formData["district"]) && $formData["district"] == "yes") {
                    $applicablePrograms[] = 4;
                }

                if (isset($formData["first_nations"]) && $formData["first_nations"] == "yes") {
                    $applicablePrograms[] = 5;
                }

                if (isset($formData["solar"]) && $formData["solar"] == "yes") {
                    $applicablePrograms[] = 6;
                }
                return $applicablePrograms;
            }
        }
