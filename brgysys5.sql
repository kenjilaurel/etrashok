-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2019 at 09:43 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brgysys5`
--

-- --------------------------------------------------------

--
-- Table structure for table `classified_waste`
--

CREATE TABLE `classified_waste` (
  `id` int(11) NOT NULL,
  `date_classified` date NOT NULL,
  `resident_segregation_id` int(11) NOT NULL,
  `waste_class_id` int(11) NOT NULL,
  `weight` float NOT NULL,
  `unit` varchar(100) NOT NULL DEFAULT 'kg',
  `facilitator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classified_waste`
--

INSERT INTO `classified_waste` (`id`, `date_classified`, `resident_segregation_id`, `waste_class_id`, `weight`, `unit`, `facilitator_id`) VALUES
(8, '2019-04-11', 2, 2, 21, 'kg', 9),
(9, '2019-04-11', 2, 7, 1, 'kg', 9),
(10, '2019-04-11', 2, 11, 2, 'kg', 9),
(11, '2019-04-11', 2, 15, 23, 'kg', 9),
(12, '2019-04-11', 2, 16, 3, 'kg', 9),
(13, '2019-04-11', 2, 17, 1, 'kg', 9),
(14, '2019-04-11', 2, 18, 2, 'kg', 9),
(15, '2019-04-11', 1, 3, 11, 'kg', 9),
(16, '2019-04-11', 1, 4, 1, 'kg', 9),
(17, '2019-04-11', 1, 5, 2, 'kg', 9),
(18, '2019-04-11', 1, 6, 1, 'kg', 9),
(19, '2019-04-11', 11, 1, 2, 'kg', 9),
(20, '2019-04-11', 11, 8, 2, 'kg', 9),
(21, '2019-04-11', 11, 9, 2, 'kg', 9),
(22, '2019-04-11', 11, 10, 21, 'kg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`id`, `userID`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `junktable`
--

CREATE TABLE `junktable` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `junktable`
--

INSERT INTO `junktable` (`id`, `category`, `description`, `price`, `created`) VALUES
(2, 6, 'recycle2223', '160.00', '2019-07-06 23:07:41'),
(8, 4, 'mixed waste', '150.00', '2019-07-07 03:18:01'),
(9, 5, 'rwaste', '20.00', '2019-07-07 03:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `laws_policies`
--

CREATE TABLE `laws_policies` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laws_policies`
--

INSERT INTO `laws_policies` (`id`, `title`, `description`) VALUES
(1, 'Prohibited Acts Fines & Penalties', '<div class="DnnModule DnnModule-DNN_HTML DnnModule-6744" style="box-sizing: inherit; color: rgb(10, 10, 10); font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;"><div class="c_DNN6 c_DNN6_Header" style="box-sizing: inherit;"><h3 class="Title Blue" style="box-sizing: inherit; margin-bottom: 0.5rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: inherit; text-rendering: optimizelegibility; line-height: 1; font-size: 1.25rem; text-transform: uppercase;"><span style="box-sizing: inherit; color: rgb(0, 128, 0);">PROHIBITED ACTS | FINES AND PENALTIES | REPUBLIC ACT 6969 TOXIC SUBSTANCES, HAZARDOUS AND NUCLEAR WASTE CONTROL ACT OF 1990</span><br style="box-sizing: inherit;"></h3><div id="dnn_ctr6744_ContentPane" style="box-sizing: inherit;"><div class="DNNModuleContent ModDNNHTMLC" id="dnn_ctr6744_ModuleContent" style="box-sizing: inherit;"><div class="Normal" id="dnn_ctr6744_HtmlModule_lblContent" style="box-sizing: inherit;"><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 13. Prohibited Acts.&nbsp;</span>–<span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span>The following acts and omissions shall be considered unlawful:</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">a. Knowingly use in chemical substance or mixture which is imported, manufactured, processed or distributed in violation of this Act or implementing rules and regulations or orders;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">b. Failure or refusal to submit reports, notices or on the information, access to records as required by this Act, or permit inspection of establishment where chemicals are manufactured, processed, stored or otherwise held;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">c. Failure or refusal to comply with the pre-manufacture and pre-importation requirements; and</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">d. Cause, aid or facilitate, directly or indirectly, in the storage, importation or bringing into Philippine territory, including its maritime economic zones, even in transit, either by means of land, air or sea transportation or otherwise keeping in storage any amount of hazardous and nuclear wastes in any part of the Philippines.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 14. Criminal Offenses and Penalties.</span></p><table cellpadding="0" style="box-sizing: inherit; border-spacing: 0px; width: 610px; margin-bottom: 1rem; border-radius: 3px;"><tbody style="box-sizing: inherit; border: 1px solid rgb(241, 241, 241); background-color: rgb(254, 254, 254);"><tr style="box-sizing: inherit;"><td valign="top" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">a)</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">i. The penalty of imprisonment of six (6) months and one day to six (6) years and one day and a fine ranging from Six hundred pesos (Php600.00) to Four thousand pesos (PhP4,000.00) shall be imposed upon any person who shall violate section 13(a) to (c) of this Act and shall not be covered by the Probation Law. If the offender is a foreigner, he or she shall be deported and barred from any subsequent entry into the Philippines after serving his or her sentence;<p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">&nbsp;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">ii. In case any violation of this Act is committed by a partnership, corporation, association or any juridical person, the partner, president, director or manager who shall consent to or shall knowingly tolerate such violation shall be directly liable and responsible for the act of the employees and shall be criminally liable as a co-principal;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">iii. In case the offender is a government official or employee, he or she shall, in addition to the above penalties, be deemed automatically dismissed from office and permanently disqualified from holding any elective or appointive position.</p></td></tr><tr style="box-sizing: inherit; background-color: rgb(241, 241, 241);"><td valign="top" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">b)</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">i. The penalty of imprisonment of twelve (12) years and one day to twenty (20) years, shall be imposed upon any person who shall violate section 13 (d) of this Act. If the offender is a foreigner, he or she shall be deported and barred from any subsequent entry into the Philippines after serving his or her sentence;<p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">&nbsp;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">ii. In the case of corporations or other associations, the above penalty shall be imposed upon the managing partner, president or chief executive in addition to an exemplary damage of at least Five hundred thousand pesos (PhP500,000.00). If it is a foreign firm, the director and all officers of such foreign firm shall be barred from entry into the Philippines, in addition to the cancellation of its license to do business in the Philippines;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">iii. In case the offender is a government official or employee, he or she shall in addition to the above penalties be deemed automatically dismissed from office and permanently be disqualified from holding any elective or appointive position.</p></td></tr></tbody></table><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">c) Every penalty imposed for the unlawful importation, entry, transport, manufacture, processing, sale or distribution of chemical substances or mixtures into or within the Philippines shall carry with it the confiscation and forfeiture in favor of the Government of the proceeds of the unlawful act and instruments, tools or other improvements including vehicles, sea vessels and aircraft used in or with which the offense was committed. Chemical substances so confiscated and forfeited by the Government at its option shall be turned over to the Department of Environment and Natural Resources for safekeeping and proper disposal.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">d) The person or firm responsible or connected with the bringing or importation into the country of hazardous or nuclear wastes shall be under obligation to transport or send back said prohibited wastes;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">Any and all means of transportation, including all facilities and appurtenances that may have been used in transporting to or in the storage in the Philippines of any significant amount of hazardous or nuclear wastes shall at the option of the government be forfeited in its favor.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 15. Administrative Fines.&nbsp;</span>–&nbsp;In all cases of violations of this Act, including violations of implementing rules and regulations which have been duly promulgated and published in accordance with Section 16 of this Act, the Secretary of Environment an Natural Resources is hereby authorized to impose a fine of not less than Ten thousand pesos (Php10,000.00), but not more than Fifty thousand pesos (PhP50,000.00) upon any person or entity found guilty thereof. The administrative fines imposed and collected by the Department of Environment and Natural Resources shall accrue to a special fund to be administered by the Department exclusively for projects and research activities relative to toxic substances and mixtures.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div></div><div class="DnnModule DnnModule-DNN_HTML DnnModule-6597" style="box-sizing: inherit; color: rgb(10, 10, 10); font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;"><div class="c_DNN6 c_DNN6_Header" style="box-sizing: inherit;"><h3 class="Title Blue" style="box-sizing: inherit; margin-bottom: 0.5rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: inherit; text-rendering: optimizelegibility; line-height: 1; font-size: 1.25rem; text-transform: uppercase;"><span style="box-sizing: inherit; color: rgb(0, 128, 0);">PROHIBITED ACTS | FINES AND PENALTIES | REPUBLIC ACT 9003 ECOLOGICAL SOLID WASTE MANAGEMENT ACT OF 2000</span><br style="box-sizing: inherit;"></h3><div id="dnn_ctr6597_ContentPane" style="box-sizing: inherit;"><div class="DNNModuleContent ModDNNHTMLC" id="dnn_ctr6597_ModuleContent" style="box-sizing: inherit;"><div class="Normal" id="dnn_ctr6597_HtmlModule_lblContent" style="box-sizing: inherit;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 48. Prohibited Acts<span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span></span>– The following acts are prohibited:<p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">1. Littering, throwing, dumping of waste matters in public places, such as roads, sidewalks, canals, esteros or parks, and establishment, or causing or permitting the same;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">2. Undertaking activities or operating, collecting or transporting equipment in violation of sanitation operation and other requirements or permits set forth in established pursuant;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">3.The open burning of solid waste;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">4. Causing or permitting the collection of non-segregated or unsorted wastes;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">5. Squatting in open dumps and landfills;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">6. Open dumping, burying of biodegradable or non-biodegradable materials in flood prone areas;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">7. Unauthorized removal of recyclable material intended for collection by authorized persons;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">8. The mixing of source-separated recyclable material with other solid waste in any vehicle, box, container or receptacle used in solid waste collection or disposal;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">9. Establishment or operation of open dumps as enjoined in this Act, or closure of said dumps in violation of Sec. 37;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">10. The manufacture, distribution or use of non-environmentally acceptable packaging materials;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">11. Importation of consumer products packaged in non-environmentally acceptable materials;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">12. Importation of toxic wastes misrepresented as "recyclable" or "with recyclable content";</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">13. Transport and dumplog in bulk of collected domestic, industrial, commercial, and institutional wastes in areas other than centers or facilities prescribe under this Act;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">14. Site preparation, construction, expansion or operation of waste management facilities without an Environmental Compliance Certificate required pursuant to Presidential Decree No. 1586 and this Act and not conforming with the land use plan of the LGU;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">15. The construction of any establishment within two hundred (200) meters from open dumps or controlled dumps, or sanitary landfill; and</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">16. The construction or operation of landfills or any waste disposal facility on any aquifer, groundwater reservoir, or watershed area and or any portions thereof.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 49. Fines and Penalties&nbsp;</span></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">1. Any person who violates Sec. 48 paragraph (1) shall, upon conviction, be punished with a fine of not less than Three hundred pesos (P300.00) but not more than One thousand pesos (P1,000.00) or render community service for not less than one (1) day to not more than fifteen (15) days to an LGU where such prohibited acts are committed, or both;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">2. Any person who violates Sec. 48, pars. (2) and (3), shall, upon conviction be punished with a fine of not less than Three hundred pesos (P300.00) but not more than One thousand pesos (P1,000.00) or imprisonment of not less than one (1) day but to not more than fifteen (15) days, or both;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">3. Any person who violates Sec. 48, pars. (4), (5), (6) and (7) shall, upon conviction, be punished with a fine of not less than One thousand pesos (P1,000.00) but not more than Three thousand pesos (P3,000.00) or imprisonment of not less than fifteen (15) day but to not more than six (6) months, or both;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">4. Any person who violates Sec. 48, pars (8), (9), (10) and (11) for the first time shall, upon conviction, pay a fine of Five hundred thousand pesos (P500,000.00) plus and amount not less than five percent (5%) but not more than ten percent (10%) of his net annual income during the previous year.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">5. The additional penalty of imprisonment of a minimum period of one (1) year but not to exceed three (3) years at the discretion of the court, shall be imposed for second or subsequent violations of Sec. 48, pars. (9) and (10).</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">6. Any person who violates Sec. 48, pars. (12) and (13) shall, upon conviction, be punished with a fine not less than Ten thousand pesos (P10,000.00) but not more than Two hundred thousand pesos (P200,000.00) or imprisonment of not less than thirty (30) days but not more than three (3) years, or both;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">7. Any person who violates Sec. 48, pars. (14), (15) and (16) shall, upon conviction, be punished with a fine not less than One hundred thousand pesos (P100,000.00) but not more than One million pesos (P1,000,000.00), or imprisonment not less than one (1) year but not more than six (6) years, or both.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">8. If the offense is committed by a corporation, partnership, or other juridical identity duly recognized in accordance with the law, the chief executive officer, president, general manager, managing partner or such other officer-in-charge shall be liable for the commission of the offense penalized under this Act.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">9. If the offender is an alien, he shall, after service of the sentence prescribed above, be deported without further administrative proceedings.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">10. The fines herein prescribed shall be increased by at lest ten (10%) percent every three (3) years to compensate for inflation and to maintain the deterrent functions of such fines.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 50. Administrative Sanctions</span><span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span>–<span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span>Local government officials and officials of government agencies concerned who fail to comply with and enforce rules and regulations promulgated relative to this Act shall be charged administratively in accordance with R.A. 7160 and other existing laws, rules and regulations</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div></div><div class="DnnModule DnnModule-DNN_HTML DnnModule-6598" style="box-sizing: inherit; color: rgb(10, 10, 10); font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;"><div class="c_DNN6 c_DNN6_Header" style="box-sizing: inherit;"><h3 class="Title Blue" style="box-sizing: inherit; margin-bottom: 0.5rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: inherit; text-rendering: optimizelegibility; line-height: 1; font-size: 1.25rem; text-transform: uppercase;"><span style="box-sizing: inherit; color: rgb(0, 128, 0);">PROHIBITED ACTS | FINES AND PENALTIES | REPUBLIC ACT 9275 PHILIPPINE CLEAN WATER ACT OF 2004</span><br style="box-sizing: inherit;"></h3><div id="dnn_ctr6598_ContentPane" style="box-sizing: inherit;"><div class="DNNModuleContent ModDNNHTMLC" id="dnn_ctr6598_ModuleContent" style="box-sizing: inherit;"><div class="Normal" id="dnn_ctr6598_HtmlModule_lblContent" style="box-sizing: inherit;"><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">What are the prohibited acts under R.A. 9275?</span></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Among others, the Act prohibits the following:</span></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">• Discharging or depositing any water pollutant to the water body, or such which will impede natural flow in the water body</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">• Discharging, injecting or allowing to enter into the soil, anything that would pollute groundwater</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">• Operating facilities that discharge regulated water pollutants without the valid required permits</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">• Disposal of potentially infectious medical waste into sea by vessels</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">• Unauthorized transport or dumping into waters of sewage sludge or solid waste.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">• Transport, dumping or discharge of prohibited chemicals, substances or pollutants listed under Toxic Chemicals, Hazardous and Nuclear</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">Wastes Control Act (Republic.Act No. 6969)</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">•Discharging regulated water pollutants without the valid required discharge permit pursuant to this Act</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">• Noncompliance of the LGU with the Water Quality Framework and Management Area Action Plan</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">• Refusal to allow entry, inspection and monitoring as well as access to reports and records by the DENR in accordance with this Act</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">• Refusal or failure to submit reports and/or designate pollution control officers whenever required by the DENR in accordance with this Act</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">• Directly using booster pumps in the distribution system or tampering with the water supply in such a way to alter or impair the water quality</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">• Operate facilities that discharge or allow to seep, willfully or through grave negligence, prohibited chemicals, substances, or pollutantslisted under R.A. No. 6969, into water bodies.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">• Undertake activities or development and expansion of projects, or operating wastewater treatment/sewerage facilities in violation of P.D.1586 and its IRR.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">What are the fines and penalties imposed on polluters?</span></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">The following are among the fines and penalties for violators of this Act and its IRR:</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">Upon the recommendation of the Pollution Adjudication Board (PAB), anyone who commits prohibited acts such as discharging untreated wastewater into any water body will be fined for every day of violation, the amount of not less than Php 10,000 but not more than Php 200,000.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">Failure to undertake clean-up operations willfully shall be punished by imprisonment of not less than two years and not more than four years. This also includes a fine of not less than Php 50,000 and not more than Php 100,000 per day of violation. Failure or refusal to clean up which results in serious injury or loss of life or lead to irreversible water contamination of surface, ground, coastal and marine water shall be punished with imprisonment of not less than 6 years and 1 day and not more than 12 years and a fine of Php 500,000/day for each day the contamination or omission continues.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">In cases of gross violation, a fine of not less than Php 500,000 but not more than Php 3,000,000 will be imposed for each day of violation. Criminal charges may also be filed.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div></div><div class="DnnModule DnnModule-DNN_HTML DnnModule-6599" style="box-sizing: inherit; color: rgb(10, 10, 10); font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;"><div class="c_DNN6 c_DNN6_Header" style="box-sizing: inherit;"><h3 class="Title Blue" style="box-sizing: inherit; margin-bottom: 0.5rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: inherit; text-rendering: optimizelegibility; line-height: 1; font-size: 1.25rem; text-transform: uppercase;"><span style="box-sizing: inherit; color: rgb(0, 128, 0);">PROHIBITED ACTS | FINES AND PENALTIES | REPUBLIC ACT 8749 PHILIPPINE CLEAN AIR ACT OF 1999</span><br style="box-sizing: inherit;"></h3><div id="dnn_ctr6599_ContentPane" style="box-sizing: inherit;"><div class="DNNModuleContent ModDNNHTMLC" id="dnn_ctr6599_ModuleContent" style="box-sizing: inherit;"><div class="Normal" id="dnn_ctr6599_HtmlModule_lblContent" style="box-sizing: inherit;"><div style="box-sizing: inherit;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 1</span><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">.</span><span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span>Fines and Penalties for Violations of Other Provisions in the Act</div><div style="box-sizing: inherit;">For violations of all other provisions provided in the Act and these Implementing Rules and Regulations, fine of not less than Ten Thousand Pesos (P 10,000.00) but not more than One Hundred&nbsp;Thousand Pesos (P 100,000.00) or six (6) years imprisonment or both shall be imposed.&nbsp;If the offender is a juridical person, the president, manager, directors, trustees, the pollution&nbsp;control officer or officials directly in charge of the operations shall suffer the penalty herein provided.</div><div style="box-sizing: inherit;">&nbsp;</div><div style="box-sizing: inherit;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 2</span><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">.<span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span></span>Burning of Municipal Waste</div><div style="box-sizing: inherit;">Any person who burns municipal waste in violation of Sections 1 and 3 of Rule XXV shall be&nbsp;punished with two (2) years and one (1) day to four (4) years imprisonment.</div><div style="box-sizing: inherit;">&nbsp;</div><div style="box-sizing: inherit;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 3.</span><span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span>Burning of Hazardous Substances and Wastes&nbsp;Any person who burns hazardous substances and wastes in violation of Section 1 of Rule&nbsp;XXV shall be punished with four (4) years and one (1) day to six (6) years imprisonment.</div><div style="box-sizing: inherit;">&nbsp;</div><div style="box-sizing: inherit;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 4</span><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">.</span><span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span>Burning of Bio-Medical Waste.&nbsp;Any person who burns bio-medical waste in violation of Section 4 of Rule XXV shall be&nbsp;punished with four (4) years and one (1) to six (6) years imprisonment.</div><div style="box-sizing: inherit;">&nbsp;</div><div style="box-sizing: inherit;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 5</span><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">.</span><span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span>Smoking in Public Places&nbsp;Any person who smokes inside a public building or an enclosed public place, including public</div><div style="box-sizing: inherit;">utility vehicles or other means of public transport or in any enclosed area outside of his private&nbsp;residence, private place of work or any duly designated smoking area shall be punished with six (6)&nbsp;months and one (1) day to one (1) year imprisonment or a fine of ten thousand pesos (P 10,000.00).</div><div style="box-sizing: inherit;">&nbsp;</div><div style="box-sizing: inherit;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 6</span><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">.</span><span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span>Manufacture, Importation, Sale, Offer for Sale, Introduction into Commerce,&nbsp;Conveyance or other Disposition of Leaded Gasoline.</div><div style="box-sizing: inherit;">Any person who manufactures, imports, sells, offers for sale, introduces into commerce,&nbsp;conveys or otherwise disposes of, in any manner leaded gasoline shall be punished with three (3)&nbsp;years and one (1) day to five (5) years imprisonment and liable for the appropriate fine as provided in&nbsp;Section 1.</div><div style="box-sizing: inherit;">&nbsp;</div><div style="box-sizing: inherit;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 7.</span><span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span>Manufacture, Importation, Sale, Offer for Sale, Introduction into Commerce,&nbsp;Conveyance or other Disposition of Engines and/or Engine Components Requiring Leaded&nbsp;Gasoline.</div><div style="box-sizing: inherit;">&nbsp;</div><div style="box-sizing: inherit;">Any person who manufactures, imports, sells, offers for sale, introduces into commerce,</div><div style="box-sizing: inherit;">conveys or otherwise disposes of, in any manner engines and/or engine components which require the</div><div style="box-sizing: inherit;">use of leaded gasoline shall be punished with three (3) years and one (1) day to five (5) years</div><div style="box-sizing: inherit;">imprisonment and liable for the appropriate fine as provided in Section 1.</div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 8</span><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">.</span><span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span>Manufacture, Importation, Sale, Offer for Sale, Dispensation, Transportation or&nbsp;Introduction into Commerce of Unleaded Gasoline&nbsp;Fuel which do not Meet the Fuel</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">Specifications.</p><div style="box-sizing: inherit;">Any person who manufactures, sells, offers for sale, dispenses, transports or introduces into&nbsp;commerce unleaded premium gasoline fuel in violation of Section 3 of Rule XXXI or which do not&nbsp;meet the fuel specifications as revised by the DOE shall be punished with three (3) years and one (1)&nbsp;day to five (5) years imprisonment and liable for the appropriate fine as provided in Section 1.</div><div style="box-sizing: inherit;">&nbsp;</div><div style="box-sizing: inherit;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 9</span>.<span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span>Manufacture, Importation, Sale, Offer for Sale, Dispensation, Transportation or&nbsp;Introduction into Commerce of Automotive Diesel Fuel which do not Meet the Fuel.</div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">Specifications.</p><div style="box-sizing: inherit;">Any person who manufactures, sells, offers for sale, dispenses, transports or introduces into&nbsp;commerce automotive diesel fuel in violation of Section 3 of Rule XXXI or which do not meet the&nbsp;fuel specifications as revised by the DOE shall be punished with three (3) years and one (1) day to&nbsp;five (5) years imprisonment and liable for the appropriate fine as provided in Section 1.</div><div style="box-sizing: inherit;">&nbsp;</div><div style="box-sizing: inherit;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 10.</span><span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span>Manufacture, Importation, Sale, Offer for Sale, Dispensation, Transportation or&nbsp;Introduction into Commerce of Industrial Diesel Fuel which do not Meet the Fuel</div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">Specifications.</p><div style="box-sizing: inherit;">Any person who manufactures, sells, offers for sale, dispenses, transports or introduces into</div><div style="box-sizing: inherit;">commerce industrial diesel fuel in violation of Section 3 of Rule XXXI or which do not meet the fuel</div><div style="box-sizing: inherit;">specifications as revised by the DOE shall be punished with three (3) years and one (1) day to five (5)</div><div style="box-sizing: inherit;">years imprisonment and liable for the appropriate fine as provided in Section 1.</div><div style="box-sizing: inherit;">&nbsp;</div><div style="box-sizing: inherit;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 11.</span><span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span>Manufacture, Processing, Trade of Fuel or Fuel Additive Without Prior&nbsp;Registration of the Fuel or Fuel Additive with the DOE.</div><div style="box-sizing: inherit;">&nbsp;</div><div style="box-sizing: inherit;">Any person who manufactures, processes, or engages in the trade of any fuel or fuel additive&nbsp;without having the fuel or fuel additive registered with the DOE shall be punished with two (2) years&nbsp;and one (1) day to four (4) years of imprisonment and liable for the appropriate fine as provided in&nbsp;Section 1.</div><div style="box-sizing: inherit;">&nbsp;</div><div style="box-sizing: inherit;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Section 12</span>.<span class="Apple-converted-space" style="box-sizing: inherit;">&nbsp;</span>Misfuelling.</div><div style="box-sizing: inherit;">Misfuelling refers to the act of introducing or causing or allowing the introduction of leaded&nbsp;gasoline into any motor vehicle equipped with a gasoline tank filler inlet and labeled “unleaded&nbsp;gasoline only.”</div><div style="box-sizing: inherit;">&nbsp;</div><div style="box-sizing: inherit;">Any person who misfuels shall be punished with one (1) year and one (1) day to three (3)&nbsp;years imprisonment or a fine of twenty thousand pesos (P 20,000.00)</div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p></div></div><div class="DnnModule DnnModule-DNN_HTML DnnModule-6603" style="box-sizing: inherit; color: rgb(10, 10, 10); font-family: &quot;Helvetica Neue&quot;, Helvetica, Roboto, Arial, sans-serif;"><div class="c_DNN6 c_DNN6_Header" style="box-sizing: inherit;"><h3 class="Title Blue" style="box-sizing: inherit; margin-bottom: 0.5rem; font-family: Roboto, Helvetica, Arial, sans-serif; color: inherit; text-rendering: optimizelegibility; line-height: 1; font-size: 1.25rem; text-transform: uppercase;"><span style="box-sizing: inherit; color: rgb(0, 128, 0);">PROHIBITED ACTS | FINES AND PENALTIES | PRESIDENTIAL DECREE 1586 ENVIRONMENTAL IMPACT STATEMENT (EIS) STATEMENT OF 1978</span><br style="box-sizing: inherit;"></h3><div id="dnn_ctr6603_ContentPane" style="box-sizing: inherit;"><div class="DNNModuleContent ModDNNHTMLC" id="dnn_ctr6603_ModuleContent" style="box-sizing: inherit;"><div class="Normal" id="dnn_ctr6603_HtmlModule_lblContent" style="box-sizing: inherit;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Legal Basis of Fines and Penalties</span><br style="box-sizing: inherit;">The fines, penalties and sanctions of the Philippine EIS System is based on the Section 9.0 provision of P.D. 1586, as follows: "&nbsp;Penalty for Violation.-&nbsp;Any person, corporation or partnership found violating Section 4 of this Decree, or the terms and conditions in the issuance of the Environmental Compliance Certificate, or of the standards, rules and regulations issued by the National Environmental Protection Council pursuant to this Decree shall be punished the suspension or cancellation of his/its certificate and/or a fine in an amount not to exceed fifty thousand pesos (P50,000.00) for every violation thereof,&nbsp; at the discretion of the National Environmental Protection Council."<p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">Section 4&nbsp; of P.D. 1586&nbsp; states that "No person, partnership or corporation shall undertake or operate any such declared environmentally critical project or area without first securing an Environmental Compliance Certificate issued by the President or his duly authorized representative."</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Suspension of ECCs</span></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">ECCs may be suspended for violation of Proponents to comply with ECC conditions. It is noted that ECC suspension does not necessarily mean the Proponent is absolved of its responsibility in implementing its approved Environmental Management Plan (EMP).&nbsp; PD 1586 does not preclude the fact that DENR may require the Proponent to institute environmental safeguards/measures to prevent further threat or actual damage to the environment.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Authority to Impose Fines and Penalties</span></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">Imposition of fines and penalties is vested on the Directors of the EMB Central Office or Regional Office upon persons or entities found violating provisions of P.D. 1586 and its Implementing Rules and Regulations.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Cease and Desist Order</span></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">The EMB Director or the EMB-RD may issue a Cease and Desist Order (CDO) based on violations under the Philippine EIS System to prevent grave or irreparable damage to the environment which cannot be attributed to specific environmental laws&nbsp;(e.g. RA 8749, RA 9275, RA 6969, etc).&nbsp;Such CDO shall be effective immediately.&nbsp;An appeal or any motion seeking to lift the CDO shall not stay its effectivity. However, the DENR shall act on such appeal or motion within ten (10) working days from filing.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Publication of Firms</span></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">The EMB may publish the identities of firms that are in violation of P.D. 1586 and its Implementing Rules and Regulations despite repeated Notices of Violation.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Scope of Violations –&nbsp;Violations of provisions of PD 1586 and DAO 2003-30 are classified as follows:</span></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Projects with or without ECCs which pose grave and/or irreparable danger to environment, life and property;</span></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">Projects which are established and/or operating without an ECC:&nbsp;A project that has commenced its implementation is deemed "operating without an ECC", whether or not it is in actual operation. The phrase "operating without ECC" refers to all projects that were implemented without ECC that should have been required&nbsp; by the P.D. 1586 IRR. Operating with an ECC secured from agencies or entities other than DENR is also considered "operating without an ECC". Projects operating without an ECC shall not be issued EMB regional environmental permits by EMB-PCD/EQD until such projects have complied with the PEISS in securing an ECC.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Projects violating ECC conditions and EMP Commitments and other procedural requirements of the Philippine EIS System:</span></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">Violations in relation to ECC conditions are classified as minor and major offenses, differentiated by schedule of fines based on seriousness and gravity of the offense:</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">MINOR Offenses&nbsp;</span>(violations of administrative&nbsp; conditions in the ECC and the EIS System procedures, rules and regulations that will not have direct significant impact on the environment but can impede or delay compliance against other ECC conditions and/or EMP commitments which the Proponent is required to comply or can prevent/deter&nbsp; EMB from performing monitoring or audit functions on the Proponent''s environmental performance)<span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">,&nbsp;</span>such as:&nbsp; 1) non-submission or delay in&nbsp; submission of reports/requirements; 2)&nbsp; transfer of ownership of the project/ECC without prior approval from ECC-issuing authority; 3) delay&nbsp; or failure to initiate formation or implementation of ECC conditions which do not have significant impacts on the environment, such as formation of EU, MMT, EMF, EGF, enhancement measures and other&nbsp; similar/equivalent requirements prior to the required deadline in the ECC; 4) non-compliance with other&nbsp; administrative conditions in the ECC; 5) non-compliance with administrative and technical procedural guidelines in the DAO 2003-30 and its&nbsp; Revised Procedural Manual;&nbsp; and&nbsp; 6) Other offenses deemed "minor" at the discretion of the EMB CO/RO Director.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">MAJOR Offenses&nbsp;&nbsp;</span>(violations of substantive&nbsp; conditions in the ECC and the EIS System procedures, rules and regulations that will have significant impact on the environment and&nbsp; which the Proponent is required to comply)<span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">,&nbsp;</span>such as: 1) non-implementation of substantive conditions in the ECC on the EMP and EMoP and other related substantive commitments in the EIA Report, including modifications during EIA Report Review, 2)&nbsp; exceedance of project limits or area; 3) significant addition of&nbsp; project component or product without prior DENR-EMB approval; 4) major change in project process or technology resulting in unmitigated significant&nbsp; impacts not addressed by approved EMP; 5) Other&nbsp; offenses deemed "major" at the discretion of the EMB CO/RO Director.<br style="box-sizing: inherit;">d.Misrepresentations, whether material or minor constitute violations on the theory that full disclosure in the EIA Report is the key to the effective use of the EIS System as a planning and management tool.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Assessment and Computation of Fines</span></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">Failure to pay a fine imposed by the Secretary, EMB Director or the RD constitutes an offense separate from the original offense that brought about the imposition of the original fine and may warrant the imposition of another fine, and/or the issuance of a CDO.</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">For projects operating without an ECC:</span>&nbsp;&nbsp; The sum of P50,000.00 is set as the maximum amount of fine.&nbsp; The amount of fine can be appropriately reduced at the discretion of the Secretary, the EMB Director, or the RD, considering the circumstances of each case, i.e. impact of the violation on the environment. The project may be subjected to penalty following the mechanics of reduction as shown in&nbsp;<span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Table 2-2.</span></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Table 2-2.&nbsp; Schedule of Penalty Reduction in case of "Operating without ECC"</span></p><table align="center" border="1" cellpadding="0" cellspacing="0" style="box-sizing: inherit; border-spacing: 0px; width: 610px; margin-bottom: 1rem; border-radius: 3px;"><tbody style="box-sizing: inherit; border: 1px solid rgb(241, 241, 241); background-color: rgb(254, 254, 254);"><tr style="box-sizing: inherit;"><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">CRITERIA</span></td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">PERCENT REDUCTION IN PENALTY</span></td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">EQUIVALENT AMOUNT IN PESO TO BE DEDUCTED</span></td></tr><tr style="box-sizing: inherit; background-color: rgb(241, 241, 241);"><td colspan="3" valign="bottom" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">1. Timing of ECC Application</span></td></tr><tr style="box-sizing: inherit;"><td valign="bottom" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">Proponent Applied for ECC before issuance of NOV</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">25</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">12,500</td></tr><tr style="box-sizing: inherit; background-color: rgb(241, 241, 241);"><td colspan="3" valign="bottom" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">2. Percentage Project Completion</span></td></tr><tr style="box-sizing: inherit;"><td valign="bottom" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">Project is 25% complete</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">10</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">5,000</td></tr><tr style="box-sizing: inherit; background-color: rgb(241, 241, 241);"><td valign="bottom" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">Project is &gt; 25% but &lt; 50% complete</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">5</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">2,500</td></tr><tr style="box-sizing: inherit;"><td valign="bottom" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">Project is &gt;50% complete</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">0</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">0</td></tr><tr style="box-sizing: inherit; background-color: rgb(241, 241, 241);"><td colspan="3" valign="bottom" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">3. Project Cost</span></td></tr><tr style="box-sizing: inherit;"><td valign="bottom" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">Project&nbsp;&lt;&nbsp;&nbsp;PhP&nbsp; 5.0 M</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">20</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">10,000</td></tr><tr style="box-sizing: inherit; background-color: rgb(241, 241, 241);"><td valign="bottom" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">Project is &gt;PhP 5.0M</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">10</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">5,000</td></tr><tr style="box-sizing: inherit;"><td colspan="3" valign="bottom" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">4. Project Impact on the Environment</span></td></tr><tr style="box-sizing: inherit; background-color: rgb(241, 241, 241);"><td valign="bottom" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">Project does not cause adverse environmental impacts</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">25</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">12,500</td></tr><tr style="box-sizing: inherit;"><td colspan="3" valign="top" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">Note: A maximum of 80% reduction in penalty can only be imposed provided that the project Proponent meets all of the above criteria.<p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">&nbsp;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">In case of violation of ECC conditions, EMP, or EIS rules and regulations</span>:&nbsp;The sum of P50,000.00 is again set as the maximum amount of fine&nbsp;per violation. Violation of one condition in the ECC is an offense separate and distinct from the violation of another condition. It is possible that a respondent be subjected to a fine of more than P50,000.00 if more than one ECC condition is violated. However, the amount of fine per violation may be accordingly reduced, following the schedule of fines presented in&nbsp;<span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Table 2-3.</span></p></td></tr></tbody></table><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">&nbsp; &nbsp;Table 2-3.&nbsp; Schedule of Penalty Reduction in case of Violations of ECC Conditions</span></p><table align="center" border="1" cellpadding="0" cellspacing="0" style="box-sizing: inherit; border-spacing: 0px; width: 610px; margin-bottom: 1rem; border-radius: 3px;"><tbody style="box-sizing: inherit; border: 1px solid rgb(241, 241, 241); background-color: rgb(254, 254, 254);"><tr style="box-sizing: inherit;"><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">CRITERIA</span></td><td colspan="4" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">PENALTY</span></td></tr><tr style="box-sizing: inherit; background-color: rgb(241, 241, 241);"><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">&nbsp;</span></td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">1st&nbsp;</span><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">&nbsp;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Offense</span></p></td><td valign="top" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">2nd Offense</span></td><td valign="top" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">3rd&nbsp;</span><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">&nbsp;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Offense</span></p></td><td valign="top" style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">4th&nbsp;</span><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"></p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">&nbsp;</p><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Offense</span></p></td></tr><tr style="box-sizing: inherit;"><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Minor Offenses</span></td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">PhP 10,000.00</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">PhP 25,000.00</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">PhP 50,000.00</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">PhP 50,000 plus ECC suspension with option of DENR-EMB to cease operations if deemed necessary but with corresponding requirement&nbsp; for continued EMP implementation</td></tr><tr style="box-sizing: inherit; background-color: rgb(241, 241, 241);"><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;"><span style="box-sizing: inherit; font-weight: 700; line-height: inherit;">Major Offenses</span></td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">PhP 25,000.00</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">PhP 50,000.00</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">PhP 50,000 plus ECC suspension with option of DENR-EMB to cease operations if deemed necessary but with corresponding requirement&nbsp; for continued EMP implementation</td><td style="box-sizing: inherit; padding: 0.5rem 0.625rem 0.625rem;">&nbsp;</td></tr></tbody></table><p style="box-sizing: inherit; margin-bottom: 1rem; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;">Misrepresentation&nbsp;in the EIA Reports or any other documents&nbsp;submitted by the Proponent: This violationshall be subjected to due process and may result to a fine in a fixed maximum amount of PhP50,000.00 for every proven misrepresentation. The Proponent and the preparer responsible for the misrepresentation shall be solidarily liable for the payment of the fine, without prejudice to other EMB actions towards the Proponent or Preparer who repeatedly commit the same offense.</p></div></div></div></div></div>');

-- --------------------------------------------------------

--
-- Table structure for table `resident_segragation`
--

CREATE TABLE `resident_segragation` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL,
  `date_uploaded` date NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `collected` tinyint(2) NOT NULL DEFAULT '0',
  `segregation_remarks_id` tinyint(2) NOT NULL DEFAULT '0',
  `deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resident_segragation`
--

INSERT INTO `resident_segragation` (`id`, `category_id`, `resident_id`, `date_uploaded`, `image_path`, `collected`, `segregation_remarks_id`, `deleted`) VALUES
(1, 1, 10, '2019-07-01', 'Untitled.png', 1, 2, 0),
(2, 1, 10, '2019-07-01', 'easy5m.png', 1, 2, 0),
(3, 1, 10, '2019-07-01', 'Untitled.png', 1, 2, 0),
(4, 1, 10, '2019-07-01', 'Untitled.png', 1, 2, 0),
(5, 2, 10, '2019-07-01', 'pmisthekey.png', 1, 3, 0),
(6, 2, 10, '2019-07-01', 'easy5m.png', 1, 3, 0),
(7, 2, 10, '2019-07-01', 'Untitled.png', 1, 3, 0),
(8, 4, 10, '2019-07-01', 'easy5m.png', 1, 4, 0),
(9, 4, 10, '2019-07-01', 'Untitled.png', 1, 4, 0),
(10, 5, 10, '2019-07-01', 'pmisthekey.png', 1, 5, 0),
(11, 5, 10, '2019-07-01', 'Untitled.png', 1, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `segregation_remarks`
--

CREATE TABLE `segregation_remarks` (
  `id` int(11) NOT NULL,
  `collector_id` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `violation_id` int(11) NOT NULL,
  `date_collected` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `segregation_remarks`
--

INSERT INTO `segregation_remarks` (`id`, `collector_id`, `remarks`, `violation_id`, `date_collected`) VALUES
(1, 11, 'test', 6, '2019-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `sitio`
--

CREATE TABLE `sitio` (
  `id` int(11) NOT NULL,
  `sitio_name` varchar(255) NOT NULL,
  `leader` int(11) NOT NULL,
  `deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitio`
--

INSERT INTO `sitio` (`id`, `sitio_name`, `leader`, `deleted`) VALUES
(2, 'DOÑA LUISA', 7, 0),
(3, 'DOÑA MANUELA', 11, 0),
(4, 'testes', 6, 1),
(5, 'NAKADA', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `application_no` int(20) NOT NULL,
  `precinct_no` int(20) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `category` int(4) NOT NULL,
  `assisted_by` varchar(255) NOT NULL,
  `address_province` varchar(150) NOT NULL,
  `address_city` varchar(150) NOT NULL,
  `address_brgy` varchar(255) NOT NULL,
  `address_street_house` varchar(255) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `citizenship_acquired` tinyint(3) NOT NULL DEFAULT '0',
  `natural_reacquire_date` date NOT NULL,
  `certificate_no` int(20) NOT NULL,
  `period_residence_city_yr` int(11) NOT NULL,
  `period_residence_city_month` int(11) NOT NULL,
  `period_residence_phil_yr` int(11) NOT NULL,
  `profession` varchar(200) NOT NULL,
  `tin` int(20) NOT NULL,
  `sex` tinyint(2) NOT NULL DEFAULT '0',
  `date_birth` date NOT NULL,
  `place_birth_city` varchar(100) NOT NULL,
  `place_birth_province` varchar(100) NOT NULL,
  `civil_status` tinyint(2) NOT NULL,
  `spouse` varchar(150) NOT NULL,
  `approved` tinyint(2) NOT NULL DEFAULT '0',
  `user_role` tinyint(5) NOT NULL DEFAULT '0',
  `account_id` int(11) NOT NULL,
  `sitio` int(11) NOT NULL,
  `image_path` varchar(100) NOT NULL DEFAULT 'No_Image_Available.jpg',
  `deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `application_no`, `precinct_no`, `firstname`, `middlename`, `lastname`, `category`, `assisted_by`, `address_province`, `address_city`, `address_brgy`, `address_street_house`, `citizenship`, `citizenship_acquired`, `natural_reacquire_date`, `certificate_no`, `period_residence_city_yr`, `period_residence_city_month`, `period_residence_phil_yr`, `profession`, `tin`, `sex`, `date_birth`, `place_birth_city`, `place_birth_province`, `civil_status`, `spouse`, `approved`, `user_role`, `account_id`, `sitio`, `image_path`, `deleted`) VALUES
(4, 2147483647, 2147483647, 'Admin', 'Admin', 'Admin', 9001, 'Angel Locsin', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Ave', 'American', 2, '2017-06-13', 897732451, 1, 8, 36, 'Soul Collector', 2147483647, 1, '2019-03-20', 'California                  ', 'Daval del Norte                  ', 1, 'Anne Curts', 0, 1, 5, 3, '18882235_673355002858301_9212811533929875470_n.jpg', 0),
(6, 234234234, 123123123, 'Edgar', 'N', 'Parokya', 9111, 'Jiego Bangkilan', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Street.', 'American', 1, '2019-03-13', 2147483647, 1, 1, 1, 'Singer', 23123123, 0, '1960-01-13', 'Davao City', 'Davao del Sur', 1, 'Neri', 1, 2, 2, 0, 'No_Image_Available.jpg', 0),
(7, 234234234, 123123123, 'Edgardo', 'N', 'Parokya', 9111, 'Jiego Bangkilan', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Street.', 'American', 1, '2019-03-13', 2147483647, 1, 1, 1, 'Singer', 23123123, 1, '1960-01-13', 'Davao City ', 'Davao del Sur ', 1, 'Neri', 1, 3, 3, 2, 'SzdjNNEJ_400x400.jpg', 0),
(8, 2312, 123, 'Kate Ethel', 'K.', 'Dagohoy', 9000, 'Jiego Bangkilan', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Street.', 'Philam', 0, '2019-03-12', 23123123, 2, 2, 2, 'sdasd', 3123123, 1, '2019-03-13', 'Davao City', 'Daval del Norte', 0, '', 0, -1, 6, 0, 'No_Image_Available.jpg', 0),
(9, 2312, 123, 'Mic', 'K.', 'Tan', 9000, 'Jiego Bangkilan', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Street.', 'Philam', 0, '2019-03-12', 23123123, 2, 2, 2, 'sdasd', 3123123, 1, '2019-03-13', 'Davao City  ', 'Daval del Norte  ', 0, '', 1, 4, 9, 2, 'U739q39o_400x400.jpg', 0),
(10, 2147483647, 23423424, 'Trisha', 'D.', 'Laurel', 9010, 'Jiego Bangkilan', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Ave', 'American', 1, '2019-03-05', 33423, 3, 3, 3, 'Singer', 334234234, 1, '2019-03-12', 'Davao City   ', 'Davao del Sur   ', 0, 'Angel Locsin', 1, 3, 8, 2, '8670050924_6aeede1f71_c.jpg', 0),
(11, 22222, 2222, 'Maxpein', 'D.', 'Tejada', 9000, '', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Ave', 'Filipino', 0, '2019-03-04', 2312312, 2, 2, 2, 'Soul Collector', 3333, 1, '2019-03-12', 'Davao City ', 'Davao del Sur ', 0, 'Neri', 1, 2, 7, 2, 'f738ee21b7ed342178a938aa654ea414c5f06c27v2_hq.jpg', 0),
(12, 23123123, 123123, 'Michael', 'P', 'Santos', 9000, '', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Ave', 'Filipino', 0, '0000-00-00', 0, 1, 1, 1, 'Facilitator', 2312312, 1, '2004-10-20', 'Davao City', 'Davao del Sur', 1, 'Anne Curts', 0, -1, 10, 3, 'No_Image_Available.jpg', 0),
(13, 2222, 222, 'test', 'teste', 'test', 9000, '', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Ave', 'Filipino', 0, '0000-00-00', 0, 1, 1, 1, 'Developer', 23213123, 0, '2019-04-15', 'Davao City', 'Davao del Sur', 0, '', 0, 0, 11, 3, 'No_Image_Available.jpg', 0),
(14, 2147483647, 23124, 'Ken', 'L', 'Santiago', 9000, '', 'Davao del Sur', 'Davao City', 'Mawab', 'Nograles Ave', 'Filipino', 0, '0000-00-00', 0, 10, 10, 10, 'Tambay', 0, 1, '1993-10-27', 'Davao City ', 'Davao del Sur ', 1, 'Sha sha Grey', 1, 3, 12, 3, 'Ken_Liu_2016.jpg', 0),
(15, 2147483647, 211123, 'Vic', 'S', 'Netro', 9100, 'Jiego Bangkilan', 'Davao del Sur', 'Davao City', 'Mwab', 'Nograles Ave', 'Filipino', 0, '0000-00-00', 0, 11, 11, 11, 'Drunker', 222222123, 1, '1985-12-18', 'Davao City ', 'Davao del Sur ', 1, 'Maxine M', 1, 3, 13, 2, 'netro-img.jpg', 0),
(16, 234234, 34242, 'May', 'K', 'Johney', 9000, '', 'Davao del Sur', 'Davao City', 'Mawab', 'Nograles Ave', 'Filipino', 0, '0000-00-00', 0, 22, 0, 22, 'Construction', 0, 0, '2002-06-12', 'Davao City', 'Davao del Sur', 0, '', 0, -1, 14, 3, 'No_Image_Available.jpg', 0),
(17, 199991988, 2147483647, 'ChrIstian', 'Lumbayon', 'Castanares', 9100, 'Angel Locsin', 'Davao del Sur', 'Davao City', 'Brgy 76-b', '12', 'Filipino', 0, '0000-00-00', 0, 6, 6, 12, 'None', 223121, 1, '2019-04-15', 'California       ', 'Daval del Norte                 ', 1, 'Anne Curts', 1, 2, 15, 5, 'Pack_of_the_Silver_Moon_Small_Photo_1.png', 0),
(18, 127371237, 123123, 'Christian', 'L', 'Castanares', 9100, 'Angel Locsin', 'Davao del Sur', 'Davao City', 'Brgy 76-A', '', 'Dalagang Pilipina', 0, '0000-00-00', 0, 1, 1, 1, 'Singer', 12334142, 1, '2018-09-10', 'Davao City  ', 'Davao del Sur   ', 1, 'Anne Curts', 0, -1, 16, 5, 'No_Image_Available.jpg', 0),
(19, 1243318, 263478, 'Eden', 'A', 'Butiong', 9100, 'Jiego Bangkilan', 'Davao del Sur', 'Davao City', 'Daliao', 'Nograles Ave', 'Filipino', 0, '0000-00-00', 0, 2, 3, 4, 'Singer', 12222, 1, '2019-04-16', 'Davao City  ', 'Davao del Sur   ', 1, 'Piolo pascual', 1, 2, 17, 5, 'No_Image_Available.jpg', 0),
(20, 123123, 23123, 'Nakada', 'Nakada', 'Nakada', 9100, 'Angel Locsin', 'Nakada', 'Davao City', 'Brgy 76-A', 'Nograles Ave', 'filipina', 0, '0000-00-00', 0, 1, 1, 1, 'Soul Collector', 123123, 1, '2012-04-05', 'Davao City  ', 'Davao del Sur   ', 0, 'Anne Curts', 1, 3, 18, 5, 'No_Image_Available.jpg', 0),
(21, 2147483647, 312412341, 'nakadacoll', 'nakadacoll', 'nakadacoll', 9100, 'Angel Locsin', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Ave', 'filipina', 0, '0000-00-00', 0, 1, 1, 1, 'Soul Collector', 123123, 0, '2018-09-18', 'Davao City  ', 'Davao del Sur   ', 0, 'nakadacoll', 1, 2, 19, 5, 'No_Image_Available.jpg', 0),
(22, 151215151, 511, 'Daniel', 'Rubiato', 'Laurel', 9010, 'Angel Locsin', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Street.', 'Filipino', 0, '0000-00-00', 0, 15, 0, 15, 'Web Dev', 123123, 1, '2009-04-02', 'Manila', 'Manila', 0, 'Anne Curts', 0, 0, 20, 2, 'No_Image_Available.jpg', 0),
(23, 121211231, 12313, 'sadasdasda', 'admin', 'asd1', 9100, 'Jiego Bangkilan', 'Davao del Sur', 'Davao City', 'Brgy 76-A', 'Nograles Ave', 'Dalagang Pilipina', 0, '0000-00-00', 0, 6, 12, 121, 'qwqew', 123333, 1, '2012-04-05', 'Davao City  ', 'Daval del Norte', 0, 'Anne Curts', 0, 0, 21, 5, 'No_Image_Available.jpg', 0),
(24, 213123, 1231, 'asdad', 'asdd', 'asdas', 9100, 'asdasd', 'asdasd', 'sadasd', 'asdasd', 'asdasdasd', 'asdasd', 0, '0000-00-00', 0, 12, 12, 12, 'sdasd', 12344, 1, '2019-06-05', 'asdas', 'asdads', 0, 'dasdasd', 1, 7, 22, 5, 'No_Image_Available.jpg', 0),
(26, 12345, 123456, 'abc', 'abc', 'abc', 9100, 'asdasd', 'del sur', 'davao', 'toril', 'street', 'Filipino', 0, '0000-00-00', 0, 15, 15, 15, 'driver', 123, 1, '2019-06-05', 'davao', 'del sur', 0, 'none', 0, -1, 24, 2, 'No_Image_Available.jpg', 0),
(27, 123123, 123123, 'qwe', 'qwe', 'qwe', 9100, 'asdasd', 'qwe', 'davao', 'toril', 'street', 'Filipino', 0, '0000-00-00', 0, 3, 1, 4, 'driver', 3234, 1, '2019-06-05', 'davao', 'del sur', 0, 'none', 1, 3, 25, 5, 'No_Image_Available.jpg', 0),
(28, 123123, 12312344, 'sample', 'sample', 'sample', 9100, 'asdasd', 'del sur', 'davao', 'toril', 'street', 'Filipino', 0, '0000-00-00', 0, 2, 2, 2, 'driver', 33123, 1, '2019-06-05', 'davao', 'del sur', 0, 'none', 1, 3, 26, 2, 'No_Image_Available.jpg', 0),
(29, 444234, 4344342, 'Test', 'Test', 'Test', 9100, 'asdasd', 'del sur', 'davao', 'toril', 'street', 'Filipino', 0, '0000-00-00', 0, 5, 5, 8, 'driver', 412434, 1, '2019-06-05', 'davao', 'del sur', 0, 'none', 1, 2, 27, 3, 'No_Image_Available.jpg', 0),
(30, 444333344, 2147483647, 'test2', 'test2', 'test2', 9100, 'asdasd', 'del sur', 'davao', 'toril', 'street', 'Filipino', 0, '0000-00-00', 0, 3, 3, 3, 'driver', 14467, 1, '2019-06-05', 'davao', 'del sur', 0, 'none', 1, 3, 28, 3, 'No_Image_Available.jpg', 0),
(31, 12215, 52151, 'junk', 'junk', 'junk', 9100, 'asdasd', 'del sur', 'davao', 'toril', 'street', 'Filipino', 0, '0000-00-00', 0, 15, 15, 0, 'driver', 25151, 1, '1980-07-31', 'davao ', 'del sur ', 0, 'none', 1, 5, 29, 5, '18882235_673355002858301_9212811533929875470_n-1.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `email` varchar(140) NOT NULL,
  `password` varchar(140) NOT NULL,
  `deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `email`, `password`, `deleted`) VALUES
(2, 'parokya@gmail.com', 'parokya', 0),
(3, 'johndoe@gmail.com', 'tangere123', 0),
(4, 'facilitator1@gmail.com', 'admin1', 0),
(5, 'admin@gmail.com', 'admin', 0),
(7, 'collector@gmail.com', 'collector', 0),
(8, 'residence@gmail.com', 'residence', 0),
(9, 'facilitator@gmail.com', 'facilitator', 0),
(10, 'santos@gmail.com', 'santos', 0),
(11, 'test@gmail.com', 'test', 0),
(12, 'santiago@gmail.com', 'santiago', 0),
(13, 'netro@gmail.com', 'netro', 0),
(14, 'may@gmail.com', 'may', 0),
(15, 'chris@gmail.com', 'chris', 0),
(16, 'new@gmail.com', 'new123', 0),
(17, 'eden@gmail.com', 'eden', 0),
(18, 'nakada@gmail.com', 'nakada', 0),
(19, 'nakadacoll@gmail.com', 'nakadacoll', 0),
(20, 'daniel@abc.com', '1234567890', 0),
(21, 'samp@gmail.com', 'asd', 0),
(22, 'asd@gmail.com', 'asd', 0),
(24, 'daniel1@abc.com', '12345', 0),
(25, 'qwe@gmail.com', 'qwe', 0),
(26, 'sample@gmail.com', 'sample', 0),
(27, 'test1@gmail.com', 'test1', 0),
(28, 'test2@gmail.com', 'test2', 0),
(29, 'junk@gmail.com', 'junk', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `description`) VALUES
(1, 'Admin', 'Admin Role'),
(2, 'Collector', 'Collector Role'),
(3, 'Resident', 'Resident Role'),
(4, 'Facilitator', 'Facilitator Role'),
(5, 'Junk Shop', 'Junk Shop Role'),
(7, 'Kagawad', 'Kagawad'),
(8, 'Mayor', 'Mayor');

-- --------------------------------------------------------

--
-- Table structure for table `violation`
--

CREATE TABLE `violation` (
  `id` int(11) NOT NULL,
  `description` varchar(700) NOT NULL,
  `penalty` float NOT NULL,
  `deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `violation`
--

INSERT INTO `violation` (`id`, `description`, `penalty`, `deleted`) VALUES
(6, 'Test Violation', 500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `waste_category`
--

CREATE TABLE `waste_category` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `image_path` varchar(200) NOT NULL DEFAULT 'No_Image_Available.jpg',
  `deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waste_category`
--

INSERT INTO `waste_category` (`id`, `category`, `description`, `image_path`, `deleted`) VALUES
(1, 'White Goods', 'This is usually industrial appliances waste and clothes', 'trash-3323974_960_720.png', 0),
(2, 'Special Waste', 'This is hazardous waste', 'No_Image_Available.jpg', 0),
(3, 'test', 'test', 'No_Image_Available.jpg', 1),
(4, 'Mixed Waste', 'Non recyclable material', 'No_Image_Available.jpg', 0),
(5, 'Recyclable Waste', 'Recyclable Material such as paper and etc', '0957806570890a1-1.jpg', 0),
(6, 'Recycle2223', 'test', '0957806570890a1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `waste_class`
--

CREATE TABLE `waste_class` (
  `id` int(11) NOT NULL,
  `waste_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waste_class`
--

INSERT INTO `waste_class` (`id`, `waste_category_id`, `name`, `deleted`) VALUES
(1, 4, 'Plastic', 0),
(2, 5, 'Paper waste', 0),
(3, 1, 'Appliances waste', 0),
(4, 1, 'dishwashing', 0),
(5, 1, 'Clothes', 0),
(6, 1, 'Kitchen thing', 0),
(7, 5, 'Fruits waste', 0),
(8, 4, 'Metal', 0),
(9, 4, 'Copper', 0),
(10, 4, 'Brass', 0),
(11, 5, 'Vegetables waste', 0),
(12, 2, 'Generators', 0),
(13, 2, 'Transporter', 0),
(14, 2, 'Facilities', 0),
(15, 5, 'Wood waste', 0),
(16, 5, 'Plant waste', 0),
(17, 5, 'Animal waste', 0),
(18, 5, 'Super waste', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classified_waste`
--
ALTER TABLE `classified_waste`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `junktable`
--
ALTER TABLE `junktable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laws_policies`
--
ALTER TABLE `laws_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resident_segragation`
--
ALTER TABLE `resident_segragation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `segregation_remarks`
--
ALTER TABLE `segregation_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitio`
--
ALTER TABLE `sitio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `violation`
--
ALTER TABLE `violation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waste_category`
--
ALTER TABLE `waste_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waste_class`
--
ALTER TABLE `waste_class`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classified_waste`
--
ALTER TABLE `classified_waste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `junktable`
--
ALTER TABLE `junktable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `laws_policies`
--
ALTER TABLE `laws_policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `resident_segragation`
--
ALTER TABLE `resident_segragation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `segregation_remarks`
--
ALTER TABLE `segregation_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sitio`
--
ALTER TABLE `sitio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `violation`
--
ALTER TABLE `violation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `waste_category`
--
ALTER TABLE `waste_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `waste_class`
--
ALTER TABLE `waste_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
